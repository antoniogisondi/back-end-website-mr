# Use the official PHP image from the Docker Hub
FROM php:7.4-fpm

# Install composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Use the default production configuration
RUN mv "$PHP_INI_DIR/php.ini-production" "$PHP_INI_DIR/php.ini"

# Install the necessary PHP extensions for Laravel
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath opcache

# Set the working directory
WORKDIR /var/www/html

# Copy the application files to the container
COPY . /var/www/html

# Install the PHP dependencies using Composer
RUN composer install --no-dev --optimize-autoloader

# Change ownership of the application files to the www-data user
RUN chown -R www-data:www-data /var/www/html

# Expose port 9000 for PHP-FPM
EXPOSE 9000

# Start the PHP-FPM server
CMD ["php-fpm"]
