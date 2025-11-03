#!/usr/bin/env bash
set -euo pipefail

# Generate Nginx config with the correct PORT
envsubst '${PORT}' < /etc/nginx/templates/default.conf.template > /etc/nginx/conf.d/default.conf

cd /var/www/html

# Ensure .env exists or use environment variables
if [ ! -f .env ]; then
  echo "No .env file found. Using environment variables only."
fi

# Laravel prep only
php artisan storage:link || true
php artisan migrate --force || true
php artisan config:cache || true
php artisan route:cache || true
php artisan view:cache || true

# Start supervisor (manages Nginx + PHP-FPM)
exec /usr/bin/supervisord -c /etc/supervisor/supervisord.conf
