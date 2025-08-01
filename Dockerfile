FROM php:8.2-cli

ARG DEBIAN_FRONTEND=noninteractive

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
    libpq-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install pdo pdo_pgsql pdo_mysql mbstring zip bcmath pcntl gd


COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www

COPY . .

RUN composer install --optimize-autoloader --no-dev

RUN chmod -R 775 storage bootstrap/cache \
    && chown -R www-data:www-data .

COPY ./entrypoint.sh /entrypoint.sh
RUN chmod +x /entrypoint.sh

# ✅ Apenas um CMD: o script de boot
CMD ["/entrypoint.sh"]
