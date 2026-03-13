#!/usr/bin/env bash
set -euo pipefail

# Usage:
#   scripts/composer-fallback-update.sh update
#   scripts/composer-fallback-update.sh install
#   scripts/composer-fallback-update.sh update --with-all-dependencies
#
# Optional env vars:
#   COMPOSER_INTERNAL_MIRROR=https://your-company-mirror.example/repository/php/
#   COMPOSER_ALLOW_DIRECT=1   # also try direct (no proxy) connection per mirror

ACTION="${1:-update}"
shift || true

MIRRORS=(
  "https://repo.huaweicloud.com/repository/php/"
  "https://mirrors.aliyun.com/composer/"
  "https://mirrors.tencent.com/composer/"
  "https://repo.packagist.org"
)

if [[ -n "${COMPOSER_INTERNAL_MIRROR:-}" ]]; then
  MIRRORS=("${COMPOSER_INTERNAL_MIRROR}" "${MIRRORS[@]}")
fi

TMP_DIR="$(mktemp -d)"
trap 'rm -rf "${TMP_DIR}"' EXIT

if [[ -f composer.lock ]]; then
  cp composer.lock "${TMP_DIR}/composer.lock"
fi

attempt() {
  local mirror="$1"
  local mode="$2"
  shift 2

  local env_prefix=( )
  if [[ "$mode" == "direct" ]]; then
    local host
    host="$(echo "$mirror" | sed -E 's#https?://([^/]+)/?.*#\1#')"
    env_prefix+=("NO_PROXY=$host" "no_proxy=$host")
    env_prefix+=("HTTPS_PROXY=" "HTTP_PROXY=" "https_proxy=" "http_proxy=")
  fi

  echo "[composer-fallback] trying (${mode}) mirror: ${mirror}"

  TMP_COMPOSER_JSON="${TMP_DIR}/composer.json" MIRROR="${mirror}" python - <<'PY'
import json, os
with open('composer.json') as f:
    d = json.load(f)
d['repositories'] = [{"type": "composer", "url": os.environ['MIRROR']}]
with open(os.environ['TMP_COMPOSER_JSON'], 'w') as f:
    json.dump(d, f, indent=4, ensure_ascii=False)
PY

  if env "${env_prefix[@]}" COMPOSER="${TMP_DIR}/composer.json" composer "${ACTION}" --no-interaction --prefer-dist "$@"; then
    echo "[composer-fallback] success (${mode}) with ${mirror}"
    return 0
  fi

  echo "[composer-fallback] failed (${mode}) mirror: ${mirror}"
  echo
  return 1
}

for mirror in "${MIRRORS[@]}"; do
  attempt "$mirror" "proxy" "$@" && exit 0

  if [[ "${COMPOSER_ALLOW_DIRECT:-0}" == "1" ]]; then
    attempt "$mirror" "direct" "$@" && exit 0
  fi
done

echo "[composer-fallback] all mirrors failed"
echo "[composer-fallback] dica: defina COMPOSER_INTERNAL_MIRROR com um mirror interno acessível pelo seu proxy/rede"
exit 1
