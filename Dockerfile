
FROM php:8.0.30-apache

# install the PHP extensions we need
RUN docker-php-ext-install pdo pdo_mysql
RUN docker-php-ext-install mysqli

COPY . /var/www/html

# folders permissions
RUN chown -R www-data:www-data /var/www/html
RUN chmod -R 777 /var/www/html

# we need to copy our Apache config file
COPY ./my-httpd.conf /usr/local/apache2/conf/httpd.conf
# restart Apache
RUN a2enmod rewrite
RUN service apache2 restart

# save files in /usr/src/myapp_data
RUN mkdir /usr/src/myapp_data

# expose port 80
EXPOSE 80