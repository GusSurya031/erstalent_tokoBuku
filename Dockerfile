# Pilih base image PHP dengan versi yang didukung Laravel
FROM php:8.0-fpm

# Install ekstensi yang dibutuhkan Laravel
RUN docker-php-ext-install pdo pdo_mysql

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copy semua file ke direktori Laravel dalam container
WORKDIR /var/www/html
COPY . .

# Set file permission
RUN chown -R www-data:www-data /var/www/html
