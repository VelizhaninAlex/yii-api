FROM yiisoftware/yii2-php:7.4-apache

RUN apt-get update && apt-get install -y curl git zip && rm -rf /var/lib/apt/lists/*
COPY --from=composer /usr/bin/composer /usr/bin/composer
RUN pecl install xdebug && docker-php-ext-enable xdebug