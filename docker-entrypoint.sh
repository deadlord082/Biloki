#!/bin/sh
set -e

cd /var/www/html

if [ ! -f .env ]; then
  cp .env.example .env
fi

update_env() {
  KEY="$1"
  VALUE="$2"

  if grep -q "^${KEY}=" .env; then
    sed -i "s|^${KEY}=.*|${KEY}=${VALUE}|" .env
  else
    printf '%s=%s\n' "${KEY}" "${VALUE}" >> .env
  fi
}

update_env APP_URL http://localhost:8000
update_env DB_CONNECTION mysql
update_env DB_HOST mysql
update_env DB_PORT 3306
update_env DB_DATABASE biloki
update_env DB_USERNAME root
update_env DB_PASSWORD root
update_env REDIS_HOST redis
update_env REDIS_PASSWORD null
update_env REDIS_PORT 6379
update_env VITE_HOST 0.0.0.0
update_env VITE_PORT 5173
update_env VITE_URL http://localhost:5173

if [ -z "$(grep '^APP_KEY=' .env | cut -d'=' -f2)" ]; then
  php artisan key:generate --force
fi

if [ ! -f vendor/autoload.php ]; then
  composer install --prefer-dist --no-interaction --no-progress --no-suggest
fi

if [ ! -d node_modules ]; then
  npm install --no-audit --no-fund
fi

php artisan config:clear --no-interaction || true

exec "$@"
