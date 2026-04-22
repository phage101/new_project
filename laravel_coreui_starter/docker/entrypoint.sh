#!/bin/sh

set -e

echo "🚀 Initializing Laravel application..."

# Ensure required directories exist when volume mounts overwrite them
mkdir -p bootstrap/cache storage/framework/sessions storage/framework/views storage/framework/cache storage/logs
chmod -R 775 bootstrap/cache storage
chown -R www-data:www-data bootstrap/cache storage

# Generate APP_KEY if not set
if [ -z "$APP_KEY" ]; then
    echo "⏳ Generating APP_KEY..."
    php artisan key:generate --force
fi

# Wait for database to be ready
echo "⏳ Waiting for database connection..."
php artisan migrate:status > /dev/null 2>&1 || true

# Run migrations
echo "⏳ Running database migrations..."
php artisan migrate --force

echo "✅ Application initialization complete!"
echo ""
echo "🌐 Application running at http://localhost:8000"
echo "📊 Dashboard available at http://localhost:8000/dashboard"
echo ""
echo "To create a test user, run:"
echo "  docker-compose exec app php artisan tinker"
echo "  > User::create(['name' => 'Admin', 'email' => 'admin@example.com', 'password' => bcrypt('password123')])"
echo ""

# Start supervisor
exec /usr/bin/supervisord -c /etc/supervisor/conf.d/supervisord.conf
