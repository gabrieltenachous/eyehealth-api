FROM php:8.2-cli

# Instala dependências
RUN apt-get update && apt-get install -y \
    build-essential \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    curl \
    git \
    libzip-dev \
    libpq-dev \
    libjpeg-dev \
    libfreetype6-dev \
    mysql-client \
    libcurl4-openssl-dev

# Instala extensões PHP
RUN docker-php-ext-install pdo pdo_mysql zip exif pcntl bcmath

# Instala Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Define diretório de trabalho
WORKDIR /var/www

# Copia os arquivos do projeto
COPY . .

# Instala dependências do Laravel
RUN composer install --optimize-autoloader --no-dev

# Permissões necessárias
RUN chmod -R 775 storage bootstrap/cache \
    && chown -R www-data:www-data .

# Porta padrão
EXPOSE 8000

# Start Laravel
CMD php artisan ser
