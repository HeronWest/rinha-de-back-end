# Use a imagem PHP
FROM php:7.4-fpm

# Atualize o sistema e instale as dependências
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libzip-dev \
    zip \
    unzip \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd pdo pdo_pgsql pgsql zip

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

WORKDIR /var/www

COPY composer.json composer.json
COPY composer.lock composer.lock

RUN composer install --no-scripts

COPY . .

EXPOSE 9000

CMD ["php-fpm"]

COPY ./php.ini /usr/local/etc/php/

