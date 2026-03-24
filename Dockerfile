# 1. PHP 8.3
FROM php:8.3-apache

# 2. Dependências do sistema e extensões PHP
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libzip-dev \
    zip \
    unzip \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install pdo_mysql gd zip

# 3. Habilitar ModRewrite do Apache (Essencial para as rotas do Laravel)
RUN a2enmod rewrite

# 4. Alterar o DocumentRoot do Apache para a pasta /public do Laravel
ENV APACHE_DOCUMENT_ROOT /var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

# 5. Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

COPY . /var/www/html

# 6. Instalação das dependências usando Composer
RUN composer install

# 7. Permissões (Para evitar erros de escrita no log/cache)
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 775 storage bootstrap/cache