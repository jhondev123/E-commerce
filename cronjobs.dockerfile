# Use a imagem PHP oficial como base
FROM php:8.3-cli

# Instale as dependências necessárias
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    zip \
    unzip \
    cron \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install pdo pdo_mysql gd

# Instale o Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Defina o diretório de trabalho
WORKDIR /var/www/html

# Copie os arquivos do projeto
COPY ./backend /var/www/html

# Instale as dependências do projeto
RUN composer install --no-dev --no-interaction --no-plugins --no-scripts

# Configure as permissões
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html/storage

# Adicione o arquivo de cron
COPY cronjobs/laravel-cron /etc/cron.d/laravel-cron
RUN chmod 0644 /etc/cron.d/laravel-cron

# Crie o arquivo de log do cron
RUN touch /var/log/cron.log

# Configure o cron para usar o /proc/1/fd/1 como STDOUT (para logging no Docker)
RUN sed -i '/^$/d' /etc/cron.d/laravel-cron && sed -i 's/^/STDOUT=\/proc\/1\/fd\/1\n/' /etc/cron.d/laravel-cron

# Defina o comando de entrada
CMD ["cron", "-f"]