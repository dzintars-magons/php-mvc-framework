FROM php:8.4.11-apache

# Enable .htaccess override support
RUN a2enmod rewrite && \
    sed -i 's/AllowOverride None/AllowOverride All/' /etc/apache2/apache2.conf

# Install PDO MySQL extension
RUN docker-php-ext-install pdo pdo_mysql

# Copy your PHP app into Apache root
COPY ../ /var/www/html/

# Set proper ownership and permissions
RUN chown -R www-data:www-data /var/www/html && \
    find /var/www/html -type d -exec chmod 755 {} \; && \
    find /var/www/html -type f -exec chmod 644 {} \;
