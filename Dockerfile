FROM php:8.2-fpm-alpine3.19

RUN apk update

RUN apk add --no-cache nginx supervisor libpq-dev nodejs npm

COPY --from=composer /usr/bin/composer /usr/local/bin/composer

# RUN chmod /usr/local/bin/install-php-extensions && sync

RUN docker-php-ext-install pdo pdo_pgsql 

# RUN docker-php-ext-install pdo mbstring

# RUN install-php-extensions mbstring

RUN docker-php-ext-install fileinfo

COPY . /var/www/html

COPY ./nginxd.conf /etc/nginx/http.d/default.conf

RUN chown -R www-data:www-data /var/www/html

WORKDIR /var/www/html

RUN composer install

RUN npm install

EXPOSE 80

CMD ["/usr/bin/supervisord"]



