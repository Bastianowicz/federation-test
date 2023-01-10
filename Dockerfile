# to build image run `docker build -t federation-test-php .`
# to simply run container locally run `docker run --rm -p8000:8000 federation-test-php`
# To install dependencies on host as well run `docker run --rm -p8000:8000 -v $PWD:/app federation-test-php /bin/sh -c "composer install"`
# to run container with mounted repo run docker run --rm -p8000:8000 -v $PWD:/app federation-test-php
FROM php:8.1

RUN curl -1sLf 'https://dl.cloudsmith.io/public/symfony/stable/setup.deb.sh' | bash
RUN apt-get update && apt-get install -y git zip symfony-cli
#    mysql-client libmagickwand-dev --no-install-recommends \
#    && pecl install imagick \
#    && docker-php-ext-enable imagick \
#&& docker-php-ext-install mcrypt pdo_mysql

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

WORKDIR /app

COPY . .
RUN composer install

CMD ["symfony", "server:start"]