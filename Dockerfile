FROM php:8.2-cli

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    sqlite3 \
    libsqlite3-dev \
    nodejs \
    npm

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install PHP extensions
RUN docker-php-ext-install pdo pdo_sqlite mbstring exif pcntl bcmath gd

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /app

# Copy the entire application first
COPY . .

# Create required directories with proper permissions
RUN mkdir -p bootstrap/cache storage/framework/cache storage/framework/sessions storage/framework/views storage/logs
RUN chmod -R 775 bootstrap/cache storage

# Create SQLite database
RUN touch database/database.sqlite

# Install PHP dependencies
RUN composer install --no-dev --optimize-autoloader

# Install Node dependencies and build
RUN npm install && npm run build

# Expose port
EXPOSE 8000

# Start command
CMD php artisan migrate --force && php artisan serve --host=0.0.0.0 --port=${PORT:-8000}
