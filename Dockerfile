# 1. Use the PHP 8.3 FPM variant based on Alpine Linux for a lightweight footprint
FROM php:8.3-fpm-alpine

# 2. Install system dependencies required for PHP extensions and build tools
RUN apk add --no-cache \
    bash \
    libpng-dev \
    libjpeg-turbo-dev \
    freetype-dev \
    libzip-dev \
    zip \
    unzip \
    icu-dev \
    oniguruma-dev \
    $PHPIZE_DEPS

# 3. Configure and install PHP extensions
RUN docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install pdo_mysql gd zip intl bcmath mbstring

# 4. Copy the latest Composer binary
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# 5. Set the working directory
WORKDIR /var/www/html

# 6. Copy application files and set ownership to the web user
COPY --chown=www-data:www-data . /var/www/html

# 7. Grant write permissions to Laravel/PHP framework storage and cache directories
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# 8. Install dependencies using Composer
RUN composer install

# 9. Expose port 9000 for FastCGI communication
EXPOSE 9000

# 10. Start the PHP-FPM server
CMD ["php-fpm"]