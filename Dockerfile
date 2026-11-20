FROM php:8.3-cli

# Instalamos las dependencias del sistema y las extensiones de PHP necesarias
RUN apt-get update && apt-get install -y \
    libzip-dev \
    libpq-dev \
    zip \
    unzip \
    && docker-php-ext-install pdo pdo_pgsql pgsql zip \
    && rm -rf /var/lib/apt/lists/*

# Configuramos el directorio de trabajo
WORKDIR /var/www/html

# Comando por defecto para arrancar Laravel
CMD php artisan serve --host=0.0.0.0 --port=8000
