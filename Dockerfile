# ─── Base Image ───────────────────────────────────────────────
# Use the stable PHP + Nginx combo image (includes PHP-FPM)
FROM richarvey/nginx-php-fpm:latest

# ─── Working Directory ────────────────────────────────────────
WORKDIR /var/www/html

# ─── Copy Project Files ───────────────────────────────────────
COPY . .

# ─── Environment Configuration ────────────────────────────────
# Skip composer install (Render runs 'composer install' during build)
ENV SKIP_COMPOSER 1
ENV WEBROOT /var/www/html/public
ENV PHP_ERRORS_STDERR 1
ENV RUN_SCRIPTS 1
ENV REAL_IP_HEADER 1

# ─── Laravel Configuration ────────────────────────────────────
ENV APP_ENV=production
ENV APP_DEBUG=false
ENV LOG_CHANNEL=stderr
ENV COMPOSER_ALLOW_SUPERUSER=1

# ─── Permissions Fix ──────────────────────────────────────────
RUN chown -R nginx:nginx /var/www/html \
    && chmod -R 775 storage bootstrap/cache

# ─── Copy Custom Nginx Config ─────────────────────────────────
# (Make sure this file has NO SSL directives)
COPY conf/nginx/nginx-site.conf /etc/nginx/sites-enabled/default.conf

# ─── Laravel Optimization ─────────────────────────────────────
# Ensure artisan commands don’t stop the build if .env is missing
RUN php artisan config:clear || true \
    && php artisan cache:clear || true \
    && php artisan route:clear || true \
    && php artisan view:clear || true \
    && php artisan optimize || true

# ─── Expose HTTP Port ─────────────────────────────────────────
# Render expects your web service to listen on port 80
EXPOSE 80

# ─── Startup Script ───────────────────────────────────────────
CMD ["/start.sh"]
