ARG PHP_VERSION=8.2
ARG NODE_VERSION=20
ARG NGINX_VERSION=1.28-alpine

FROM composer:2 AS composer_deps
WORKDIR /var/www/html
COPY composer.json composer.lock ./
RUN composer install \
    --no-interaction \
    --no-dev \
    --prefer-dist \
    --optimize-autoloader \
    --no-scripts

FROM node:${NODE_VERSION}-alpine AS frontend_assets
WORKDIR /var/www/html
COPY package.json package-lock.json ./
RUN npm ci --legacy-peer-deps
COPY resources ./resources
COPY public ./public
COPY vite.config.js ./
RUN npm run build

FROM php:${PHP_VERSION}-fpm-alpine AS app
WORKDIR /var/www/html

RUN apk add --no-cache \
    fcgi \
    oniguruma \
    bash \
    && apk add --no-cache --virtual .build-deps \
        $PHPIZE_DEPS \
        oniguruma-dev \
    && docker-php-ext-install -j"$(nproc)" \
        pdo_mysql \
        mbstring \
        bcmath \
    && apk del .build-deps

RUN { \
    echo '[www]'; \
    echo 'ping.path = /ping'; \
    echo 'pm.status_path = /status'; \
} > /usr/local/etc/php-fpm.d/zz-healthcheck.conf

COPY . .
COPY --from=composer_deps /var/www/html/vendor ./vendor
COPY --from=frontend_assets /var/www/html/public/build ./public/build
COPY docker/app-entrypoint.sh /usr/local/bin/app-entrypoint.sh

RUN sed -i 's/\r$//' /usr/local/bin/app-entrypoint.sh \
    && chmod +x /usr/local/bin/app-entrypoint.sh \
    && mkdir -p storage/framework/sessions storage/framework/views storage/framework/cache storage/logs bootstrap/cache \
    && chown -R www-data:www-data storage bootstrap/cache

EXPOSE 9000
HEALTHCHECK --interval=30s --timeout=5s --retries=3 \
    CMD SCRIPT_NAME=/ping SCRIPT_FILENAME=/ping REQUEST_METHOD=GET cgi-fcgi -bind -connect 127.0.0.1:9000 || exit 1

ENTRYPOINT ["/usr/local/bin/app-entrypoint.sh"]
CMD ["php-fpm", "-F"]

FROM nginx:${NGINX_VERSION} AS web
WORKDIR /var/www/html
COPY docker/nginx/default.conf /etc/nginx/conf.d/default.conf
COPY --from=app /var/www/html/public /var/www/html/public

EXPOSE 80
HEALTHCHECK --interval=30s --timeout=5s --retries=3 \
    CMD wget -q -O /dev/null http://127.0.0.1/health || exit 1

CMD ["nginx", "-g", "daemon off;"]
