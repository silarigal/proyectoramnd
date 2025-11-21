FROM php:8.2-apache

# Extensiones de PHP si las necesitas
RUN docker-php-ext-install pdo pdo_mysql

# Copiar archivos del proyecto al servidor Apache
COPY . /var/www/html/

# Habilitar mod_rewrite (opcional pero útil)
RUN a2enmod rewrite

EXPOSE 80

CMD ["apache2-foreground"]
