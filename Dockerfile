# Use a stable PHP + Nginx base image
FROM richarvey/nginx-php-fpm:latest

# Set working directory
WORKDIR /var/www/html

# Copy project files
COPY . .

# ─── Environment Configuration ─────────────────────────────
ENV SKIP_COMPOSER 1
ENV WEBROOT /var/www/html/public
ENV PHP_ERRORS_STDERR 1
ENV RUN_SCRIPTS 1
ENV REAL_IP_HEADER 1

# ─── Laravel Configuration ─────────────────────────────────
ENV APP_ENV=production
ENV APP_DEBUG=false
ENV LOG_CHANNEL=stderr
ENV COMPOSER_ALLOW_SUPERUSER=1

# ─── System Preparation ─────────────────────────────────────
# Ensure permissions for Laravel (storage, bootstrap/cache)
RUN chown -R nginx:nginx /var/www/html \
    && chmod -R 775 storage bootstrap/cache

# ─── Nginx Configuration ────────────────────────────────────
# Copy custom nginx configuration
COPY conf/nginx/nginx-site.conf /etc/nginx/sites-enabled/default.conf

# ─── Laravel Optimization ───────────────────────────────────
# Run Laravel optimization commands
RUN php artisan config:clear || true \
    && php artisan cache:clear || true \
    && php artisan route:clear || true \
    && php artisan view:clear || true \
    && php artisan optimize || true

# ─── Startup Script ─────────────────────────────────────────
CMD ["/start.sh"]
