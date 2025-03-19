#!/bin/sh

add_newline() {
    echo "" >> /home/app/supervisor/supervisord-app.conf
}

cat /home/app/supervisor/conf.d/supervisord.conf > /home/app/supervisor/supervisord-app.conf
add_newline

if [ "$ROLE_BACKGROUND" = "true" ]; then
    cat /home/app/supervisor/conf.d/backend.conf >> /home/app/supervisor/supervisord-app.conf
    add_newline
    crontab /home/app/cron/backend.cron
fi

if [ "$ROLE_NGINX" = "true" ]; then
    cat /home/app/supervisor/conf.d/nginx.conf >> /home/app/supervisor/supervisord-app.conf
    add_newline

    # Update .htpasswd
    if [ -n "$ADMIN_PANEL_USERNAME" ] && [ -n "$ADMIN_PANEL_PASSWORD" ]; then
        htpasswd -bc /etc/nginx/.htpasswd "$ADMIN_PANEL_USERNAME" "$ADMIN_PANEL_PASSWORD"
    fi
fi

if [ "$ROLE_PHP_FPM" = "true" ]; then
    cat /home/app/supervisor/conf.d/php-fpm.conf >> /home/app/supervisor/supervisord-app.conf
    add_newline
fi

if [ "$APP_ENV" = "production" ]; then
    php artisan optimize:clear
    php artisan optimize
fi

# Set default value for REDIS_HOST if not provided
REDIS_HOST=${REDIS_HOST:-redis}

# Use envsubst to replace variables and write to the final config file
envsubst  < /etc/nginx/conf.d/upstream.conf.template > /etc/nginx/conf.d/upstream.conf

# Run supervisord with the generated configuration
exec /usr/bin/supervisord -c /home/app/supervisor/supervisord-app.conf