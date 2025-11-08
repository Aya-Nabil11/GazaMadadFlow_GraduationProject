# ─── Base Image ───────────────────────────────────────────────
# Use the stable PHP + Nginx combo image (includes PHP-FPM)
FROM richarvey/nginx-php-fpm:latest

# ─── Working Directory ────────────────────────────────────────
WORKDIR /var/www/html

# ─── Copy Composer Files First (for better caching) ───────────
COPY composer.json composer.lock ./

# ─── Install PHP Dependencies ─────────────────────────────────
# We run composer install inside Docker to generate /vendor
RUN composer install --no-dev --optimize-autoloader --no-interaction --no-progress

# ─── Copy Remaining Project Files ─────────────────────────────
COPY . .

# ─── Environment Configuration ────────────────────────────────
# No SKIP_COMPOSER now (we handle composer inside the image)
ENV WEBROOT=/var/www/html/public \
    PHP_ERRORS_STDERR=1 \
    RUN_SCRIPTS=1 \
    REAL_IP_HEADER=1 \
    APP_ENV=production \
    APP_DEBUG=false \
    LOG_CHANNEL=stderr \
    COMPOSER_ALLOW_SUPERUSER=1

# ─── Permissions Fix ──────────────────────────────────────────
RUN mkdir -p /var/www/html/storage /var/www/html/bootstrap/cache \
    && chown -R nginx:nginx /var/www/html \
    && chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

# ─── Copy Custom Nginx Config ─────────────────────────────────
# (Make sure this file has NO SSL directives)
COPY conf/nginx/nginx-site.conf /etc/nginx/sites-enabled/default.conf

# ─── Laravel Optimization ─────────────────────────────────────
RUN php artisan config:clear  || true \
 && php artisan cache:clear   || true \
 && php artisan route:clear   || true \
 && php artisan view:clear    || true \
 && php artisan optimize      || true

# ─── Expose HTTP Port ─────────────────────────────────────────
EXPOSE 80

# ─── Startup Script ───────────────────────────────────────────
CMD ["/start.sh"]
