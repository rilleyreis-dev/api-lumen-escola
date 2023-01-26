FROM php:8.0-fpm-alpine

RUN docker-php-ext-install mysqli pdo pdo_mysql
#RUN docker-php-ext-install pdo_mysql

WORKDIR /var/www/html/

#RUN php -r "copy('http://getcomposer.org/installer');" | php -- --install-dir=/usr/bin/ --filename=composer
RUN php -r "copy('http://getcomposer.org/installer', 'composer-setup.php');" && \
php composer-setup.php --install-dir=/usr/bin --filename=composer && \
php -r "unlink('composer-setup.php');"

COPY . .

RUN composer update

#RUN composer dump-autoload

#EXPOSE 8080

#CMD [ "php", "-S", "0.0.0.0:8080", "-t", "public" ]
