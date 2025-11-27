#!/bin/bash
set -euo pipefail

ORIGEM="./textos_origem_biblia/"
DESTINO="./wp-content/themes/seu-tema/bible/data/"

rsync -avz "$ORIGEM" "$DESTINO"

git add "$DESTINO"
git commit -m "Sync textos bíblicos"
git push
