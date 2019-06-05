#!/bin/bash
set -e

/etc/init.d/blackfire-agent restart

cd /usr/share/nginx/app/step2/website-skeleton/
COMPOSER_ALLOW_SUPERUSER=1 composer install
APP_ENV=dev APP_DEBUG=1 php bin/console cache:clear
echo "[Operation] Composer deployment finished for step2."

cd /usr/share/nginx/app/step3/website-skeleton/
COMPOSER_ALLOW_SUPERUSER=1 composer install
APP_ENV=dev APP_DEBUG=1 php bin/console cache:clear
echo "[Operation] Composer deployment finished for step3."

cd /usr/share/nginx/app/step4/website-skeleton/
COMPOSER_ALLOW_SUPERUSER=1 composer install
APP_ENV=dev APP_DEBUG=1 php bin/console cache:clear
echo "[Operation] Composer deployment finished for step4."

cd /usr/share/nginx/app/step5/website-skeleton/
COMPOSER_ALLOW_SUPERUSER=1 composer install
APP_ENV=dev APP_DEBUG=1 php bin/console cache:clear
echo "[Operation] Composer deployment finished for step5."

php-fpm
