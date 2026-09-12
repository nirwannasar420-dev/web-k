# syntax=docker/dockerfile:1

FROM node:24-bookworm-slim AS frontend

WORKDIR /app

COPY package.json package-lock.json ./

RUN npm ci --ignore-scripts

COPY resources ./resources
COPY public ./public
COPY vite.config.js ./

RUN npm run build


FROM composer:2 AS dependencies

WORKDIR /app

COPY composer.json composer.lock ./

RUN composer install \
    --no-dev \
    --no-interaction \
    --no-progress \
    --no-scripts \
    --optimize-autoloader \
    --prefer-dist


FROM php:8.5-cli-bookworm AS application

RUN docker-php-ext-install -j"$(nproc)" pdo_mysql

WORKDIR /var/www/html

COPY . .

COPY --from=dependencies /app/vendor ./vendor

COPY --from=frontend /app/public/build ./public/build

RUN mkdir -p \
    storage/framework/cache/data \
    storage/framework/sessions \
    storage/framework/views \
    storage/logs \
    bootstrap/cache \
    && chown -R www-data:www-data storage bootstrap/cache \
    && php artisan package:discover --ansi

USER www-data

EXPOSE 8080

CMD ["sh", "-c", "php artisan migrate --force && php artisan db:seed --force && php artisan optimize && exec php artisan serve --host=0.0.0.0 --port=${PORT:-8080}"]