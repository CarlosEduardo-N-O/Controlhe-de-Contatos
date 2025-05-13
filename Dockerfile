FROM php:8.2-apache

# Instalar dependências do sistema e o Composer
RUN apt-get update && apt-get install -y \
    libpq-dev \
    unzip \
    zip \
    curl \
    && docker-php-ext-install pdo pdo_pgsql \
    && curl -sS https://getcomposer.org/installer | php \
    && mv composer.phar /usr/local/bin/composer

# Ativar mod_rewrite para URLs amigáveis
RUN a2enmod rewrite

# Copiar config personalizada do Apache
COPY .docker/vhost.conf /etc/apache2/sites-available/000-default.conf

# Copiar os arquivos do projeto
COPY . /var/www/html/

# Permissões
RUN chown -R www-data:www-data /var/www/html
