#!/usr/bin/env bash
set -euo pipefail

# Atualiza apenas o framework Laravel e dependências relacionadas.
# Respeita os mesmos fallbacks de mirror/proxy do script principal.

scripts/composer-fallback-update.sh update laravel/framework --with-all-dependencies "$@"
