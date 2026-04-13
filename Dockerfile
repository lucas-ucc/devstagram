# -------- STAGE 1: frontend --------
FROM node:20 AS frontend

WORKDIR /app

COPY package*.json ./
RUN npm install

COPY . .
RUN npm run build


# -------- STAGE 2: backend --------
FROM php:8.3-fpm

RUN docker-php-ext-install pdo pdo_mysql

WORKDIR /var/www

# instalar dependencias básicas
RUN apt-get update && apt-get install -y \
    git unzip curl zip \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libonig-dev \
    libxml2-dev \
 && docker-php-ext-configure gd --with-freetype --with-jpeg \
 && docker-php-ext-install gd

# instalar composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# copiar proyecto
COPY . .

# instalar PHP deps
RUN composer install --no-dev --optimize-autoloader

# copiar assets ya buildados
COPY --from=frontend /app/public/build /var/www/public/build

# permisos
RUN chown -R www-data:www-data /var/www

EXPOSE 9000
CMD ["php-fpm"]