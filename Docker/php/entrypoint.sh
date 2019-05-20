#!/bin/bash
set -e

/etc/init.d/blackfire-agent restart

php-fpm
