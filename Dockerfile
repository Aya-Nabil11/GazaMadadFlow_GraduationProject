# ─── Base Image ───────────────────────────────────────────────
# Use the stable PHP + Nginx combo image (includes PHP-FPM)
FROM richarvey/nginx-php-fpm:latest

# ─── Working Directory ────────────────────────────────────────
WORKDIR /var/www/html

# ─── Copy Project Files ───────────────────────────────────────
COPY . .

# ─── Environment Configuration ────────────────────────────────
ENV SKIP_COMPOSER 1 \
    WEBROOT=/var/www/html/public \
    PHP_ERRORS_STDERR=1 \
    RUN_SCRIPTS=1 \
    REAL_IP_HEADER=1 \
    APP_ENV=production \
    APP_DEBUG=false \
    LOG_CHANNEL=stderr \
    COMPOSER_ALLOW_SUPERUSER=1

# ─── Permissions Fix ──────────────────────────────────────────
# Ensure writable directories exist and have correct ownership
RUN mkdir -p /var/www/html/storage /var/www/html/bootstrap/cache \
    && chown -R nginx:nginx /var/www/html \
    && chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

# ─── Copy Custom Nginx Config ─────────────────────────────────
# (Make sure this file has NO SSL directives)
COPY conf/nginx/nginx-site.conf /etc/nginx/sites-enabled/default.conf

# ─── Laravel Optimization ─────────────────────────────────────
# Use "|| true" so build doesn't fail if artisan can't find .env yet
RUN php artisan config:clear  || true \
 && php artisan cache:clear   || true \
 && php artisan route:clear   || true \
 && php artisan view:clear    || true \
 && php artisan optimize      || true

# ─── Expose HTTP Port ─────────────────────────────────────────
EXPOSE 80

# ─── Startup Script ───────────────────────────────────────────
CMD ["/start.sh"]
