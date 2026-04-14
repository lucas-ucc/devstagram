# -------- STAGE 1: frontend --------
FROM node:20 AS frontend

WORKDIR /app

COPY package*.json ./
RUN npm install

COPY . .
RUN npm run build


# -------- STAGE 2: backend --------
FROM php:8.3-fpm

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

RUN mkdir -p /var/run/nginx

WORKDIR /var/www

# composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# 👇 copiar SOLO lo necesario primero
COPY . .

RUN composer install --no-dev --optimize-autoloader

# 👇 copiar build AL FINAL (clave)
COPY --from=frontend /app/public/build /var/www/public/build

# nginx config
RUN rm -f /etc/nginx/conf.d/default.conf
COPY nginx.conf /etc/nginx/conf.d/default.conf

RUN chown -R www-data:www-data /var/www

EXPOSE 8080

CMD ["sh", "-c", "ls -la /var/www/public/build && php artisan migrate --force && php-fpm & nginx -g 'daemon off;'"]