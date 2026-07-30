# BB8 🤖 — tvoj deploy agent (kao Draganov Prometheus)

Telegram bot koji preko poruke pokreće Claude agenta. Agent je povezan s
**GitHub-om, Coolify-jem i Cloudflare-om**, pa ceo deploy odradiš jednom
rečenicom:

> „deploy d1centar-media na d1centar.jci.rs"

Sve je **open source / besplatno** osim tokena za Claude (Anthropic API) i VPS-a.

---

## Kako radi (arhitektura)

```
   ti (Telegram)
        │  "deploy X na Y"
        ▼
   BB8 bot  (bb8/bot.py — python-telegram-bot)
        │
        ▼
   Claude agent  (bb8/agent.py — claude-agent-sdk, model claude-opus-4-8)
        │  bira i zove tool-ove
        ▼
   deploy tool-ovi  (bb8/tools.py)
        ├── GitHub REST      → dodaj deploy key
        ├── Coolify REST     → napravi app + deploy
        └── Cloudflare REST  → DNS A-zapis → VPS
```

Bot sluša samo Telegram ID-jeve iz `BB8_ALLOWED_USER_IDS` (da ti niko drugi ne
komanduje infrastrukturom).

---

## Šta ti treba (jednom)

1. **VPS** (Hetzner je dobar i jeftin). Zapamti mu javni IP.
2. **Coolify** self-hosted na tom VPS-u — instalacija jednom komandom:
   ```bash
   curl -fsSL https://cdn.coollabs.io/coolify/install.sh | bash
   ```
   Otvori Coolify UI, napravi **Project** i zapamti **Project UUID** i
   **Server UUID** (vide se u URL-u / API delu).
3. **Telegram bot token** — piši `@BotFather` → `/newbot` → dobiješ token.
4. **Anthropic API key** — https://console.anthropic.com
5. **Tri API tokena:**
   - GitHub PAT (scope: `repo` + `admin:public_key`)
   - Coolify API token (Coolify → *Keys & Tokens → API tokens*)
   - Cloudflare API token (*Zone:DNS:Edit* + *Zone:Read*)

---

## Pokretanje

### Lokalno (za probu)

```bash
cd bb8
cp .env.example .env      # popuni sve vrednosti
python -m venv .venv && source .venv/bin/activate
pip install -r requirements.txt
python -m bb8.bot
```

Onda u Telegramu napiši botu `/start` — vrati ti tvoj **Telegram ID**. Ubaci ga
u `BB8_ALLOWED_USER_IDS` u `.env`, restartuj bota, i probaj:

> deploy d1centar-media na d1centar.jci.rs

### Na VPS-u kroz Coolify (da bot stalno radi)

BB8 je i sam običan repo s Dockerfile-om — dodaš ga u Coolify kao aplikaciju
(nixpacks ili Dockerfile build), postaviš iste env varijable, i on radi 24/7.
Pošto je long-polling Telegram bot, **ne treba mu izložen port ni domen**.

---

## Env varijable

Sve su u `.env.example` s objašnjenjima. Ukratko:

| Grupa | Varijable |
|---|---|
| Claude | `ANTHROPIC_API_KEY`, `BB8_MODEL` |
| Telegram | `TELEGRAM_BOT_TOKEN`, `BB8_ALLOWED_USER_IDS` |
| GitHub | `GITHUB_TOKEN`, `GITHUB_DEFAULT_OWNER` |
| Coolify | `COOLIFY_BASE_URL`, `COOLIFY_API_TOKEN`, `COOLIFY_PROJECT_UUID`, `COOLIFY_SERVER_UUID`, `COOLIFY_ENVIRONMENT` |
| Cloudflare | `CLOUDFLARE_API_TOKEN`, `VPS_PUBLIC_IP` |

---

## Važno za Laravel sajtove (kao d1centar-media)

Za razliku od statičnog Next.js-a, Laravel + SQLite ima zamke — BB8 to zna
(upisano mu je u system prompt), ali proveri:

- **SQLite (`database/database.sqlite`) i `storage/` moraju na persistent
  volume** u Coolify-ju — inače nestanu na svaki redeploy.
- Env: `APP_KEY` (generiši), `APP_ENV=production`, `APP_DEBUG=false`,
  `APP_URL=https://<poddomen>`, nasumičan `ADMIN_PATH`, `MAIL_*`.
- Post-deploy komande u Coolify-ju: `php artisan migrate --force`,
  `storage:link`, `config:cache`.

BB8 će te upozoriti ako nešto od ovoga fali, ili ti napisati šta ručno da
klikneš u Coolify UI-ju.

---

## Napomena o Coolify API-ju

Coolify v4 API se povremeno menja između verzija. Ako neki poziv vrati
`404/422`, endpointi su jasno izdvojeni u `bb8/tools.py` (funkcije
`coolify_*`) — uporedi s *API docs* na svojoj Coolify instanci i ispravi
putanju/telo. Sve ostalo (GitHub, Cloudflare) je stabilno.

---

## Sigurnost

- Bot izvršava komande samo od ID-jeva u `BB8_ALLOWED_USER_IDS`.
- `.env` je u `.gitignore` — **nikad ne komituj tokene.**
- Agent radi u `bypassPermissions` režimu (samostalno), ali ima pristup **samo**
  ovih 6 deploy tool-ova — ne shell-u tvog VPS-a.
