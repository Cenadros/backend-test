FROM php:7.4-fpm

ENV PATH="/opt/.composer/vendor/bin:${PATH}"

# Copy composer.lock and composer.json
COPY composer.json /var/www/

# Set working directory
WORKDIR /var/www

# Install dependencies
RUN apt update && apt install -y \
    zip \
    git \
    curl

# Composer and phpcs
RUN php -r "readfile('http://getcomposer.org/installer');" | php -- --install-dir=/usr/bin/ --filename=composer
RUN mkdir /opt/.composer && \
    cd /opt/.composer && \
    composer require friendsofphp/php-cs-fixer symfony/console symfony/finder

# Add user for application
RUN groupadd -g 1000 www
RUN useradd -u 1000 -ms /bin/bash -g www www

# Copy existing application directory contents
COPY . /var/www

# Copy existing application directory permissions
COPY --chown=www:www . /var/www

# Change current user to www
USER www

CMD ["php-fpm"]
