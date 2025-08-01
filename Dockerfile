FROM php:8.2-fpm

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
    libfreetype6-dev

# Instala extensões PHP
RUN docker-php-ext-install pdo pdo_mysql zip exif pcntl

# Instala Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Define diretório de trabalho
WORKDIR /var/www

# Copia os arquivos
COPY . .

# Instala dependências do Laravel
RUN composer install --optimize-autoloader --no-dev

# Permissões
RUN chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache

# Porta padrão do PHP-FPM
EXPOSE 8000

CMD php artisan serve --host=0.0.0.0 --port=8000
