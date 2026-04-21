# Multi-stage Docker build for Laravel + CoreUI application
# Stage 1: Build assets and dependencies
FROM node:20-alpine AS builder

WORKDIR /app

# Install build dependencies for Alpine
RUN apk add --no-cache python3 make g++

# Copy package files (package-lock.json is optional)
COPY package*.json ./

# Install Node dependencies (use legacy-peer-deps for vite@8 vs laravel-vite-plugin@2)
RUN npm install --legacy-peer-deps

# Copy source code
COPY . .

# Build frontend assets
RUN npm run build

# Stage 2: Final application image
FROM php:8.2-fpm-alpine

WORKDIR /app

# Install system dependencies
RUN apk add --no-cache \
    nginx \
    curl \
    zip \
    unzip \
    git \
    mysql-client \
    libpng-dev \
    oniguruma-dev \
    libxml2-dev \
    supervisor

# Install PHP extensions
RUN docker-php-ext-install \
    pdo_mysql \
    mbstring \
    exif \
    pcntl \
    bcmath \
    gd

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copy PHP configuration
RUN echo "cgi.fix_pathinfo = 0" >> /usr/local/etc/php/conf.d/99-custom.ini

# Configure Nginx
COPY docker/nginx.conf /etc/nginx/nginx.conf

# Configure Supervisor
COPY docker/supervisord.conf /etc/supervisor/conf.d/supervisord.conf

# Copy entrypoint script
COPY docker/entrypoint.sh /app/entrypoint.sh
RUN chmod +x /app/entrypoint.sh

# Copy application files
COPY . .

# Copy built assets from builder stage
COPY --from=builder /app/public/build /app/public/build

# Install PHP dependencies
RUN composer install --no-interaction --optimize-autoloader --no-dev

# Create necessary directories
RUN mkdir -p /app/storage/logs \
    && mkdir -p /app/bootstrap/cache \
    && chmod -R 775 /app/storage /app/bootstrap/cache

# Set permissions
RUN chown -R www-data:www-data /app \
    && chmod -R 755 /app

# Expose port
EXPOSE 80

# Health check
HEALTHCHECK --interval=30s --timeout=10s --start-period=5s --retries=3 \
    CMD curl -f http://localhost/health || exit 1

# Run initialization and start services
ENTRYPOINT ["/app/entrypoint.sh"]
