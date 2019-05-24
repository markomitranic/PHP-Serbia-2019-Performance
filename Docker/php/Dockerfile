FROM php:7.3-fpm

ARG HTTP_PORT=80
ENV HTTP_PORT=$HTTP_PORT
ARG BF_ID
ENV BF_ID=$BF_ID
ARG BF_TOKEN
ENV BF_TOKEN=$BF_TOKEN

RUN apt-get update
RUN apt-get install nano -y
RUN apt-get install wget -y
RUN apt-get install unzip -y

RUN docker-php-ext-install pdo_mysql \
    && docker-php-ext-install mysqli

RUN apt-get install -y libzip-dev
RUN docker-php-ext-install zip

RUN apt-get install libjpeg-dev libpng-dev -y
RUN docker-php-ext-configure gd \
        --with-jpeg-dir=/usr/include/ \
    && docker-php-ext-install gd

COPY conf/php-fpm.conf /usr/local/etc/php-fpm.d/zzz-fpm.conf
COPY conf/php.ini /usr/local/etc/php/conf.d/custom-php.ini

# Blackfire Installation
RUN apt-get install -y gnupg \
    && wget -q -O - https://packages.blackfire.io/gpg.key | apt-key add - \
    && echo "deb http://packages.blackfire.io/debian any main" | tee /etc/apt/sources.list.d/blackfire.list \
    && apt-get update \
    && apt-get install blackfire-agent \
    && apt-get install blackfire-php

# Blackfire Config
COPY conf/blackfire.ini /etc/blackfire/agent
RUN echo "server-id=${BF_ID}" >> /etc/blackfire/agent \
    && echo "server-token=${BF_TOKEN}" >> /etc/blackfire/agent

# Composer Install
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

COPY entrypoint.sh /home/root/entrypoint.sh
RUN chmod 0775 /home/root/entrypoint.sh
ENTRYPOINT /home/root/entrypoint.sh

# If you feel like using xDebug...
#
#RUN yes | pecl install xdebug-2.7.0beta1
#RUN echo "zend_extension=$(find /usr/local/lib/php/extensions/ -name xdebug.so)" > /usr/local/etc/php/conf.d/xdebug.ini \
#    && echo "xdebug.remote_enable=on" >> /usr/local/etc/php/conf.d/xdebug.ini \
#    && echo "xdebug.remote_autostart=on" >> /usr/local/etc/php/conf.d/xdebug.ini \
#    && echo "xdebug.remote_host=host.docker.internal" >> /usr/local/etc/php/conf.d/xdebug.ini
