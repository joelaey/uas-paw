FROM php:8.2-cli

# Install system dependencies (NO Node.js needed - build assets are pre-committed)
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    sqlite3 \
    libsqlite3-dev

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install PHP extensions
RUN docker-php-ext-install pdo pdo_sqlite mbstring exif pcntl bcmath gd

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /app

# Copy the entire application (including pre-built assets in public/build/)
COPY . .

# Create required directories with proper permissions
RUN mkdir -p bootstrap/cache storage/framework/cache storage/framework/sessions storage/framework/views storage/logs
RUN chmod -R 777 bootstrap/cache storage

# Create SQLite database
RUN touch database/database.sqlite && chmod 777 database/database.sqlite

# Install PHP dependencies
RUN composer install --no-dev --optimize-autoloader

# Verify build assets exist
RUN ls -la public/build/ && cat public/build/.vite/manifest.json

# Set default environment variables
ENV APP_ENV=production
ENV APP_DEBUG=false
ENV DB_CONNECTION=sqlite

# Expose port
EXPOSE 8000

# Start script
CMD ["sh", "-c", "php artisan config:clear && php artisan migrate --force && php artisan serve --host=0.0.0.0 --port=${PORT:-8000}"]
