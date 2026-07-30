"""
BB8 Telegram bot — vlasnik pošalje poruku, BB8 odradi deploy i javi nazad.

Pokretanje:  python -m bb8.bot
"""

import os
import logging

from dotenv import load_dotenv
from telegram import Update
from telegram.ext import (
    Application,
    CommandHandler,
    MessageHandler,
    ContextTypes,
    filters,
)

load_dotenv()

from .agent import run_agent  # noqa: E402  (posle load_dotenv da env postoji)

logging.basicConfig(
    format="%(asctime)s  %(levelname)s  %(message)s", level=logging.INFO
)
log = logging.getLogger("bb8")


def _allowed_ids() -> set[int]:
    raw = os.environ.get("BB8_ALLOWED_USER_IDS", "").strip()
    return {int(x) for x in raw.split(",") if x.strip().isdigit()}


ALLOWED = _allowed_ids()


def _authorized(update: Update) -> bool:
    return bool(update.effective_user) and update.effective_user.id in ALLOWED


async def cmd_start(update: Update, _ctx: ContextTypes.DEFAULT_TYPE) -> None:
    uid = update.effective_user.id if update.effective_user else "?"
    if _authorized(update):
        await update.message.reply_text(
            f"Zdravo, ja sam BB8 🤖\nTvoj Telegram ID: {uid} (odobren).\n\n"
            "Napiši npr.:\n„deploy d1centar-media na d1centar.jci.rs"
        )
    else:
        await update.message.reply_text(
            f"Tvoj Telegram ID je {uid}.\n"
            "Nisi na listi odobrenih. Dodaj ovaj ID u BB8_ALLOWED_USER_IDS pa restartuj bota."
        )


async def on_message(update: Update, _ctx: ContextTypes.DEFAULT_TYPE) -> None:
    if not _authorized(update):
        await update.message.reply_text("⛔ Nemaš dozvolu da komanduj:)")
        return

    prompt = (update.message.text or "").strip()
    if not prompt:
        return

    log.info("Zahtev od %s: %s", update.effective_user.id, prompt)
    await update.message.reply_text("🚀 Radim na tome…")

    try:
        async for chunk in run_agent(prompt):
            # Telegram limit ~4096 karaktera po poruci.
            await update.message.reply_text(chunk[:4000])
    except Exception as exc:  # pragma: no cover
        log.exception("Agent pukao")
        await update.message.reply_text(f"⚠️ Puklo je: {exc}")


def main() -> None:
    token = os.environ["TELEGRAM_BOT_TOKEN"]
    app = Application.builder().token(token).build()
    app.add_handler(CommandHandler("start", cmd_start))
    app.add_handler(MessageHandler(filters.TEXT & ~filters.COMMAND, on_message))
    log.info("BB8 je online. Odobreni ID-jevi: %s", ALLOWED or "(nijedan!)")
    app.run_polling()


if __name__ == "__main__":
    main()
