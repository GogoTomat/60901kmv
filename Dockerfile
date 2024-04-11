# Используем официальный образ PHP с Apache
FROM php:8.3.2-apache

# Устанавливаем необходимые расширения PHP и инструменты
RUN apt-get update && \
    apt-get install -y \
    libpq-dev \
    zip \
    unzip \
    git \
    && docker-php-ext-install pdo pdo_pgsql

# Устанавливаем Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Копируем все файлы проекта в каталог /var/www/html в контейнере
COPY . /var/www/html

# Копируем файл .env в контейнер
COPY .env /var/www/html/.env

# Назначаем права на папки storage и bootstrap/cache
RUN chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

# Устанавливаем права на шаблоны
RUN chmod -R 644 /var/www/html/resources/views/*

# Настраиваем корневую директорию сервера Apache
WORKDIR /var/www/html

# Устанавливаем зависимости Composer
RUN composer install

# CMD ["php", "artisan", "view:clear"]
#CMD ["php", "artisan", "key:generate"]
CMD ["php", "artisan", "serve", "--host=0.0.0.0"]
