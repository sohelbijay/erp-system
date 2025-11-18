# ============================
# Base image: PHP + Apache
# ============================
FROM php:8.2-apache

# Set Laravel public folder
ENV APACHE_DOCUMENT_ROOT=/var/www/html/public
WORKDIR /var/www/html

# ============================
# Install system dependencies
# ============================
RUN apt-get update && apt-get install -y \
    libonig-dev \
    libzip-dev \
    zip \
    unzip \
    git \
    curl \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    nodejs \
    npm \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install pdo_mysql mbstring zip gd opcache \
    && docker-php-ext-enable opcache

# ============================
# Enable Apache rewrite
# ============================
RUN a2enmod rewrite

# Configure Apache document root & allow .htaccess
RUN sed -i 's|DocumentRoot /var/www/html|DocumentRoot /var/www/html/public|g' /etc/apache2/sites-available/000-default.conf \
 && sed -i 's|<Directory /var/www/>|<Directory /var/www/html/public/>|g' /etc/apache2/apache2.conf \
 && echo '<Directory /var/www/html/public>\n    AllowOverride All\n</Directory>' >> /etc/apache2/apache2.conf

# ============================
# Copy composer files first (cache layer)
# ============================
COPY composer.json composer.lock ./

# Copy composer binary
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# ============================
# Composer install (with memory limit)
# ============================
RUN php -d memory_limit=2G /usr/bin/composer install --no-dev --prefer-dist --optimize-autoloader --no-interaction --no-progress

# ============================
# Copy application code
# ============================
COPY . .

# ============================
# Set permissions
# ============================
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 775 /var/www/html/storage \
    && chmod -R 775 /var/www/html/bootstrap/cache

# ============================
# Build frontend assets (Tailwind/Vite)
# ============================
RUN npm install && npm run build

# ============================
# Laravel caches
# ============================
RUN php artisan config:cache \
    && php artisan route:cache \
    && php artisan view:cache \
    && php artisan optimize

# ============================
# Expose port & start Apache
# ============================
EXPOSE 80
CMD ["apache2-foreground"]
