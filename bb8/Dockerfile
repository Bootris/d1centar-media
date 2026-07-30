# BB8 deploy agent — kontejner koji vrti Telegram bota.
# Node je unutra jer neki MCP serveri idu preko `npx` (ako ih kasnije dodaš).
FROM python:3.12-slim

RUN apt-get update \
    && apt-get install -y --no-install-recommends nodejs npm ca-certificates \
    && rm -rf /var/lib/apt/lists/*

WORKDIR /app

COPY requirements.txt .
RUN pip install --no-cache-dir -r requirements.txt

COPY . .

# Telegram bot radi na long-polling — ne treba izložen port.
CMD ["python", "-m", "bb8.bot"]
