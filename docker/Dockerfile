FROM php:8.2-fpm-alpine AS production
RUN apk add --no-cache libpq-dev \
    && docker-php-ext-install pdo_pgsql
COPY --from=composer /usr/bin/composer /usr/bin/composer

FROM production AS local
# Xdebug and deps
RUN apk add --no-cache $PHPIZE_DEPS linux-headers \
    && pecl install xdebug \
    && docker-php-ext-enable xdebug