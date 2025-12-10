FROM php:8.2-apache

# Instalar extensión para PostgreSQL
RUN apt-get update && apt-get install -y libpq-dev \
    && docker-php-ext-install pdo pdo_pgsql

# Copiar el código al contenedor (solo para build inicial)
COPY . /var/www/html/

# Opcional: establecer directorio de trabajo
WORKDIR /var/www/html

EXPOSE 80
