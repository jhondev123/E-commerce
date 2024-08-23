# Use uma imagem base do PHP 8.3 FPM
FROM php:8.3-fpm

# Instale dependências essenciais
RUN apt-get update && apt-get install -y \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    libpng-dev \
    libonig-dev \
    libzip-dev \
    zip \
    unzip \
    && docker-php-ext-install pdo pdo_mysql

# Instale composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Defina o diretório de trabalho
WORKDIR /var/www

# Copie os arquivos do Laravel para o contêiner
COPY ./backend .

# Ajuste permissões de pasta
RUN chown -R www-data:www-data /var/www \
    && chmod -R 755 /var/www/storage 

# Exponha a porta do PHP-FPM
EXPOSE 9000

# Comando de inicialização do PHP-FPM
CMD ["php-fpm"]
