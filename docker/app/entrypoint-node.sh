#!/bin/sh

add_newline() {
    echo "" >> /home/app/supervisor/supervisord-app.conf
}

cat /home/app/supervisor/conf.d/supervisord.conf > /home/app/supervisor/supervisord-app.conf
add_newline

if [ "$ROLE_NODE" = "true" ]; then
    cat /home/app/supervisor/conf.d/node.conf >> /home/app/supervisor/supervisord-app.conf
    add_newline
fi

if [ "$ROLE_NODE" = "false" ]; then
    cat /home/app/supervisor/conf.d/keep-alive.conf >> /home/app/supervisor/supervisord-app.conf
    add_newline
fi

exec /usr/bin/supervisord -c /home/app/supervisor/supervisord-app.conf