FROM php:7.4-fpm

# Copia composer.lock y composer.json
COPY composer.lock composer.json ../miproyecto/var/www/

# Establecer directorio de trabajo
WORKDIR /var/www

# Install dependencies
RUN apt-get update && apt-get install -y \
    build-essential \
    default-mysql-client \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    locales \
    zip \
    jpegoptim optipng pngquant gifsicle \
    vim \
    unzip \
    git \
    curl

# Limpiar cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Instalar extensiones
RUN docker-php-ext-install pdo_mysql exif pcntl
RUN docker-php-ext-configure gd
RUN docker-php-ext-install gd

# Instalar composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Agregar usuario para la aplicación laravel
RUN groupadd -g 1000 www
RUN useradd -u 1000 -ms /bin/bash -g www www

# Copiar el contenido del directorio de la aplicación existente
COPY . /var/www

# Copiar los permisos del directorio de aplicaciones existentes
COPY --chown=www:www . /var/www

# Cambiar usuario actual a www
USER www

# Exponga el puerto 9000 e inicie el servidor php-fpm
EXPOSE 9000
CMD ["php-fpm"]