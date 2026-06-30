#!/bin/sh
set -e

cd /var/www/html

if [ ! -f .env ]; then
  cp .env.example .env
fi

if [ -z "$(grep '^APP_KEY=' .env | cut -d'=' -f2)" ]; then
  php artisan key:generate --force
fi

if [ ! -f vendor/autoload.php ]; then
  composer install --prefer-dist --no-interaction --no-progress --no-suggest
fi

if [ ! -d node_modules ]; then
  npm install --no-audit --no-fund
fi

exec "$@"
