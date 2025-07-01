
FROM php:8.1-apache

# Copier le code source dans le dossier Apache
COPY . /var/www/html/

# Donner les bons droits
RUN chown -R www-data:www-data /var/www/html
