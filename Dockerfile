# -------- STAGE 1: frontend --------
FROM node:20 AS frontend

WORKDIR /app

COPY package*.json ./
RUN npm install

COPY . .
RUN npm run build


# -------- STAGE 2: backend --------
FROM php:8.3-fpm

# instalar dependencias + nginx
RUN apt-get update && apt-get install -y \
    nginx \
    git unzip curl zip \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libonig-dev \
    libxml2-dev \
 && docker-php-ext-configure gd --with-freetype --with-jpeg \
 && docker-php-ext-install pdo pdo_mysql gd

WORKDIR /var/www

# instalar composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# copiar proyecto
COPY . .

# instalar dependencias PHP
RUN composer install --no-dev --optimize-autoloader

# copiar assets buildados
COPY --from=frontend /app/public/build /var/www/public/build

# copiar nginx config
COPY nginx.conf /etc/nginx/sites-available/default

# permisos
RUN chown -R www-data:www-data /var/www

# puerto para Railway
EXPOSE 80

# iniciar nginx + php
CMD service nginx start && php-fpm