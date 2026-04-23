#!/bin/sh

set -eu

cd /var/www/html

echo "Initializing Laravel container..."

if [ ! -f .env ] && [ -f .env.example ]; then
    cp .env.example .env
fi

mkdir -p bootstrap/cache storage/framework/sessions storage/framework/views storage/framework/cache storage/logs
chown -R www-data:www-data bootstrap/cache storage || true
chmod -R 775 bootstrap/cache storage || true

# Remove stale framework cache files copied from host that may reference unavailable providers.
rm -f bootstrap/cache/packages.php bootstrap/cache/services.php bootstrap/cache/config.php bootstrap/cache/routes*.php

if [ -z "${APP_KEY:-}" ]; then
    php artisan key:generate --force
    APP_KEY=$(grep '^APP_KEY=' .env | cut -d '=' -f2-)
    export APP_KEY
fi

php artisan package:discover --ansi

attempt=1
max_attempts=30

until php artisan migrate --force --no-interaction; do
    if [ "$attempt" -ge "$max_attempts" ]; then
        echo "Database not ready after ${max_attempts} attempts."
        exit 1
    fi

    echo "Waiting for database (${attempt}/${max_attempts})..."
    attempt=$((attempt + 1))
    sleep 2
done

echo "Laravel container is ready."

exec "$@"
