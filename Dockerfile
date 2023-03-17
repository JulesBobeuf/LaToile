FROM php:8.0-cli

LABEL Bobeuf Jules "bobeuf.jules@gmail.com"

RUN apt-get update -y && DEBIAN_FRONTEND=noninteractive apt-get install -y libmcrypt-dev && apt-get install nodejs

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN docker-php-ext-install pdo mbstring

WORKDIR /app
COPY . /app

RUN composer install
RUN npm install

EXPOSE 8000

CMD php artisan serve --host=0.0.0.0 --port=8000