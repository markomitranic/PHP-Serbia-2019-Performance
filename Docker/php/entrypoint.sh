#!/bin/bash
set -e

/etc/init.d/blackfire-agent restart

cd /usr/share/nginx/app/step2/website-skeleton/
COMPOSER_ALLOW_SUPERUSER=1 composer install
APP_ENV=dev APP_DEBUG=1 php bin/console cache:clear
echo "[Operation] Composer deployment finished for step2.

php-fpm
