# Change this file as necessary
FROM php:7.4.33-cli-buster

# Install services
RUN apt-get update && \
    apt-get install -y $PHPIZE_DEPS && \
    apt-get install -y git unzip zip

# Include composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copy source code
WORKDIR /app
COPY . .

# Install dependencies
RUN composer install
