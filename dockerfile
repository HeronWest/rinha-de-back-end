# Use a imagem PHP
FROM php:8-fpm

# Atualize o sistema e instale as dependências
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libzip-dev \
    zip \
    unzip \
    libpq-dev

# Instale as extensões necessárias do PHP
RUN docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd pdo pdo_pgsql pgsql zip

# Instale o Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Crie o usuário "heron" e atribua permissões apropriadas
RUN useradd -ms /bin/bash teste

# Defina o diretório de trabalho
WORKDIR /var/www

# Crie a pasta "vendor" com permissões adequadas
RUN mkdir /var/www/vendor && chown -R teste:teste /var/www

# Mude para o usuário "heron"
USER heron

# Copie os arquivos de configuração e dependências do Composer
COPY composer.json composer.json
COPY composer.lock composer.lock

# Instale as dependências do Composer como o usuário "heron"
RUN composer install --no-scripts

# Copie o restante dos arquivos do projeto
COPY . .

# Exponha a porta 9000
EXPOSE 9000

# Defina o comando para iniciar o PHP-FPM
CMD ["php-fpm"]
