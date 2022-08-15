# FROM ubuntu:20.04
FROM ubuntu:22.04
ENV DEBIAN_FRONTEND noninteractive
ENV TZ=UTC
RUN ln -snf /usr/share/zoneinfo/$TZ /etc/localtime && echo $TZ > /etc/timezone
RUN apt-get update
RUN apt-get install -y gnupg gosu curl ca-certificates zip unzip git  libcap2-bin libpng-dev python3
RUN apt install  -y --no-install-recommends php8.1
RUN apt-get install -y php8.1-imap \
        php8.1-mysql \
        php8.1-xml \
        php8.1-curl \
        php8.1-zip \
        php8.1-bcmath \
        php8.1-soap \
        php8.1-intl \
        php8.1-readline \
        php8.1-msgpack \
        php8.1-igbinary \
        php8.1-ldap \
        php8.1-redis \
        php8.1-fpm \
        php8.1-gd \
&& php -r "readfile('http://getcomposer.org/installer');" | php -- --install-dir=/usr/bin/ --filename=composer \
&& curl -sL https://deb.nodesource.com/setup_16.x | bash - \
&& apt-get install -y nodejs \
&& apt-get install -y mysql-client \
&& apt-get install -y nginx \
&& apt-get clean

WORKDIR /var/www/

# Copy project into image.
COPY src/ /var/www/

COPY nginx-default.conf /etc/nginx/sites-enabled/default
COPY nginx-main.conf /etc/nginx/nginx.conf

# Migrate laravel error log.
RUN mkdir /var/log/laravel && touch /var/log/laravel/laravel.log && touch /var/log/laravel/applications.log
RUN ln -s /var/log/laravel/laravel.log /var/www/storage/logs/laravel.log
RUN ln -s /var/log/laravel/applications.log /var/www/storage/logs/applications.log

#RUN chmod -R 777 storage/logs/laravel.log
# ownership =>  www-data:adm for logging
RUN chown -R 33:4 /var/log/laravel/
RUN chown -R 33:33 storage/logs/laravel.log

# the bash script isn't executed but can be useful for debugging
COPY entrypoint.sh /
RUN chmod +x /entrypoint.sh

# Install independencies and paackages
RUN composer install
RUN npm install --production

# Set app permission
RUN chown -R www-data:www-data /var/www
RUN chmod -R 775 storage bootstrap/cache

# Clean up
RUN rm -f package.json package-lock.json

## Start Nginx
EXPOSE 80
ENTRYPOINT  service php8.1-fpm restart \
    && service nginx restart \
    && php artisan migrate:refresh --seed --force \
    && php artisan cache:clear \
    && /usr/bin/php artisan optimize:clear \
    && /usr/bin/php artisan config:cache \
    && tail -f /var/log/nginx/* /var/log/laravel/laravel.log
