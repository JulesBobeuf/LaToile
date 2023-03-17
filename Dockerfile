FROM php:8.0-cli

LABEL Bobeuf Jules "bobeuf.jules@gmail.com"

RUN curl -sL https://deb.nodesource.com/setup_18.x | bash -

RUN apt-get update -y && apt-get install apt-utils && DEBIAN_FRONTEND=noninteractive apt-get install -y libmcrypt-dev nodejs apt-utils git zip unzip

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

WORKDIR /app
COPY . /app

RUN composer install
RUN npm install

EXPOSE 8000

CMD php artisan serve --host=0.0.0.0 --port=8000 && npm run dev

#Dev version. Dockerfile made at university
