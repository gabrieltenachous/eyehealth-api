FROM php:8.2-cli

# Evita interações durante instalação
ARG DEBIAN_FRONTEND=noninteractive

# Instala dependências do sistema
RUN apt-get update && apt-get install -y \
    zip \
    unzip \
    curl \
    git \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    libzip-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libcurl4-openssl-dev \
    default-mysql-client \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install pdo pdo_mysql mbstring zip bcmath pcntl gd

# Instala Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Define o diretório de trabalho
WORKDIR /var/www

# Copia o projeto Laravel
COPY . .

# Instala as dependências do Laravel
RUN composer install --optimize-autoloader --no-dev

# Permissões corretas para storage e cache
RUN chmod -R 775 storage bootstrap/cache \
    && chown -R www-data:www-data .

# Expõe a porta do Laravel
EXPOSE 8000

# Comando para iniciar a aplicação
CMD php artisan serve --host=0.0.0.0 --port=8000
