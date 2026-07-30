"""
BB8 deploy tools — in-process SDK tools koje agent zove da odradi deploy.

Tri servisa, svaki preko svog REST API-ja (bez spoljnih MCP servera):
  • GitHub      — dodavanje deploy key-a na repo (da Coolify može da povuče kod)
  • Coolify     — pravljenje aplikacije iz git repo-a + trigerovanje deploy-a
  • Cloudflare  — DNS A-zapis (poddomen -> IP VPS-a)

Napomena o Coolify API-ju: Coolify v4 REST API se povremeno menja između
verzija. Endpointi ovde su pisani prema aktuelnoj v1 API šemi; ako ti neki
poziv vrati 404/422, proveri putanju/telo u Coolify → API docs na tvojoj
instanci i ispravi u funkcijama ispod (jasno su izdvojene).
"""

import os
import httpx
from typing import Any

from claude_agent_sdk import tool, create_sdk_mcp_server


def _text(msg: str, is_error: bool = False) -> dict[str, Any]:
    """Standardni oblik rezultata koji SDK očekuje od tool-a."""
    out: dict[str, Any] = {"content": [{"type": "text", "text": msg}]}
    if is_error:
        out["is_error"] = True
    return out


# ─────────────────────────────────────────────────────────────
#  GitHub
# ─────────────────────────────────────────────────────────────

def _gh_headers() -> dict[str, str]:
    return {
        "Authorization": f"Bearer {os.environ['GITHUB_TOKEN']}",
        "Accept": "application/vnd.github+json",
        "X-GitHub-Api-Version": "2022-11-28",
    }


def _full_repo(repo: str) -> str:
    """'ime' -> 'owner/ime' koristeći GITHUB_DEFAULT_OWNER; 'a/b' ostaje isto."""
    if "/" in repo:
        return repo
    owner = os.environ.get("GITHUB_DEFAULT_OWNER", "")
    return f"{owner}/{repo}" if owner else repo


@tool(
    "github_add_deploy_key",
    "Dodaje read-only deploy key (SSH javni ključ) na GitHub repo da Coolify "
    "može da klonira privatni repo. Prosledi 'repo' (owner/ime ili samo ime) i "
    "'public_key' (ceo sadržaj .pub ključa koji je Coolify generisao).",
    {"repo": str, "public_key": str, "title": str},
)
async def github_add_deploy_key(args: dict[str, Any]) -> dict[str, Any]:
    repo = _full_repo(args["repo"])
    async with httpx.AsyncClient(timeout=30) as client:
        r = await client.post(
            f"https://api.github.com/repos/{repo}/keys",
            headers=_gh_headers(),
            json={
                "title": args.get("title") or "coolify-deploy",
                "key": args["public_key"],
                "read_only": True,
            },
        )
    if r.status_code in (200, 201):
        return _text(f"✅ Deploy key dodat na {repo}.")
    if r.status_code == 422 and "already in use" in r.text:
        return _text(f"ℹ️ Deploy key već postoji na {repo} — nastavljam.")
    return _text(f"GitHub greška {r.status_code}: {r.text}", is_error=True)


@tool(
    "github_repo_info",
    "Vraća osnovne info o GitHub repou (default grana, privatnost, SSH URL). "
    "Prosledi 'repo' (owner/ime ili samo ime).",
    {"repo": str},
)
async def github_repo_info(args: dict[str, Any]) -> dict[str, Any]:
    repo = _full_repo(args["repo"])
    async with httpx.AsyncClient(timeout=30) as client:
        r = await client.get(
            f"https://api.github.com/repos/{repo}", headers=_gh_headers()
        )
    if r.status_code != 200:
        return _text(f"GitHub greška {r.status_code}: {r.text}", is_error=True)
    d = r.json()
    return _text(
        f"repo={d['full_name']} default_branch={d['default_branch']} "
        f"private={d['private']} ssh_url={d['ssh_url']}"
    )


# ─────────────────────────────────────────────────────────────
#  Coolify
# ─────────────────────────────────────────────────────────────

def _coolify_headers() -> dict[str, str]:
    return {
        "Authorization": f"Bearer {os.environ['COOLIFY_API_TOKEN']}",
        "Content-Type": "application/json",
    }


def _coolify_url(path: str) -> str:
    base = os.environ["COOLIFY_BASE_URL"].rstrip("/")
    return f"{base}/api/v1{path}"


@tool(
    "coolify_create_app",
    "Pravi novu aplikaciju u Coolify iz git repo-a (nixpacks ili Dockerfile "
    "build). Vraća UUID aplikacije. Prosledi 'name', 'git_repository' (SSH ili "
    "HTTPS URL), 'git_branch', 'domain' (npr. https://d1centar.jci.rs), "
    "'ports_exposes' (port aplikacije, npr. '3000' za Next, '8080' za Laravel/nginx).",
    {
        "name": str,
        "git_repository": str,
        "git_branch": str,
        "domain": str,
        "ports_exposes": str,
    },
)
async def coolify_create_app(args: dict[str, Any]) -> dict[str, Any]:
    # ── Ako ti Coolify verzija traži drugačije polje/putanju, menjaj OVDE. ──
    payload = {
        "project_uuid": os.environ["COOLIFY_PROJECT_UUID"],
        "server_uuid": os.environ["COOLIFY_SERVER_UUID"],
        "environment_name": os.environ.get("COOLIFY_ENVIRONMENT", "production"),
        "name": args["name"],
        "git_repository": args["git_repository"],
        "git_branch": args["git_branch"],
        "build_pack": "nixpacks",
        "ports_exposes": args["ports_exposes"],
        "domains": args["domain"],
        "instant_deploy": False,
    }
    async with httpx.AsyncClient(timeout=60) as client:
        r = await client.post(
            _coolify_url("/applications/private-deploy-key"),
            headers=_coolify_headers(),
            json=payload,
        )
    if r.status_code not in (200, 201):
        return _text(f"Coolify greška {r.status_code}: {r.text}", is_error=True)
    uuid = r.json().get("uuid", "?")
    return _text(f"✅ Coolify app napravljen. uuid={uuid}")


@tool(
    "coolify_set_env",
    "Postavlja environment varijablu na Coolify aplikaciji. Prosledi "
    "'app_uuid', 'key', 'value'. Za Laravel obavezno postavi APP_KEY, "
    "APP_ENV=production, APP_URL, ADMIN_PATH itd.",
    {"app_uuid": str, "key": str, "value": str},
)
async def coolify_set_env(args: dict[str, Any]) -> dict[str, Any]:
    async with httpx.AsyncClient(timeout=30) as client:
        r = await client.post(
            _coolify_url(f"/applications/{args['app_uuid']}/envs"),
            headers=_coolify_headers(),
            json={"key": args["key"], "value": args["value"], "is_preview": False},
        )
    if r.status_code not in (200, 201):
        return _text(f"Coolify greška {r.status_code}: {r.text}", is_error=True)
    return _text(f"✅ ENV {args['key']} postavljen na app {args['app_uuid']}.")


@tool(
    "coolify_deploy",
    "Trigeruje deploy Coolify aplikacije po UUID-u. Vraća deployment UUID.",
    {"app_uuid": str},
)
async def coolify_deploy(args: dict[str, Any]) -> dict[str, Any]:
    async with httpx.AsyncClient(timeout=60) as client:
        r = await client.get(
            _coolify_url(f"/deploy?uuid={args['app_uuid']}"),
            headers=_coolify_headers(),
        )
    if r.status_code not in (200, 201):
        return _text(f"Coolify greška {r.status_code}: {r.text}", is_error=True)
    return _text(f"🚀 Deploy pokrenut: {r.text}")


# ─────────────────────────────────────────────────────────────
#  Cloudflare
# ─────────────────────────────────────────────────────────────

def _cf_headers() -> dict[str, str]:
    return {
        "Authorization": f"Bearer {os.environ['CLOUDFLARE_API_TOKEN']}",
        "Content-Type": "application/json",
    }


async def _cf_zone_id(client: httpx.AsyncClient, domain: str) -> str | None:
    """Nađe zone ID za koren domena (npr. 'jci.rs' iz 'd1centar.jci.rs')."""
    root = ".".join(domain.split(".")[-2:])
    r = await client.get(
        "https://api.cloudflare.com/client/v4/zones",
        headers=_cf_headers(),
        params={"name": root},
    )
    zones = r.json().get("result", [])
    return zones[0]["id"] if zones else None


@tool(
    "cloudflare_set_dns",
    "Pravi (ili ažurira) DNS A-zapis na Cloudflare da poddomen gleda na VPS. "
    "Prosledi 'fqdn' (pun poddomen, npr. d1centar.jci.rs). IP se uzima iz "
    "VPS_PUBLIC_IP osim ako ne proslediš 'ip'. 'proxied' default true.",
    {"fqdn": str, "ip": str, "proxied": bool},
)
async def cloudflare_set_dns(args: dict[str, Any]) -> dict[str, Any]:
    fqdn = args["fqdn"]
    ip = args.get("ip") or os.environ.get("VPS_PUBLIC_IP", "")
    if not ip:
        return _text("Nema IP-a (VPS_PUBLIC_IP prazan).", is_error=True)
    proxied = args.get("proxied", True)

    async with httpx.AsyncClient(timeout=30) as client:
        zone_id = await _cf_zone_id(client, fqdn)
        if not zone_id:
            return _text(f"Zona za {fqdn} nije nađena na Cloudflare.", is_error=True)

        base = f"https://api.cloudflare.com/client/v4/zones/{zone_id}/dns_records"
        record = {"type": "A", "name": fqdn, "content": ip, "ttl": 1, "proxied": proxied}

        # Postoji li već zapis? -> update, inače create.
        existing = await client.get(base, headers=_cf_headers(), params={"name": fqdn, "type": "A"})
        results = existing.json().get("result", [])
        if results:
            rec_id = results[0]["id"]
            r = await client.put(f"{base}/{rec_id}", headers=_cf_headers(), json=record)
            verb = "ažuriran"
        else:
            r = await client.post(base, headers=_cf_headers(), json=record)
            verb = "napravljen"

    if not r.json().get("success"):
        return _text(f"Cloudflare greška: {r.json().get('errors')}", is_error=True)
    return _text(f"✅ DNS {verb}: {fqdn} → {ip} (proxied={proxied})")


# ─────────────────────────────────────────────────────────────
#  MCP server (skup svih tool-ova koje BB8 dobija)
# ─────────────────────────────────────────────────────────────

deploy_server = create_sdk_mcp_server(
    name="deploy",
    version="1.0.0",
    tools=[
        github_add_deploy_key,
        github_repo_info,
        coolify_create_app,
        coolify_set_env,
        coolify_deploy,
        cloudflare_set_dns,
    ],
)

# Imena tool-ova onako kako ih agent vidi (za allowed_tools).
DEPLOY_TOOL_NAMES = [
    "mcp__deploy__github_add_deploy_key",
    "mcp__deploy__github_repo_info",
    "mcp__deploy__coolify_create_app",
    "mcp__deploy__coolify_set_env",
    "mcp__deploy__coolify_deploy",
    "mcp__deploy__cloudflare_set_dns",
]
