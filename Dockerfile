# Setup OS and timezone

FROM ubuntu:18.04

LABEL Name=lessgo_backend Version=0.0.1

ENV TZ=Asia/Amman

RUN ln -snf /usr/share/zoneinfo/$TZ /etc/localtime && echo $TZ > /etc/timezone4
#install php git apache etc
RUN apt-get update -y &&\
    apt-get install -y php7.2 \
    curl \
    php-curl \
    php7.2-mysql \
    php-gd \
    php-cli \
    php-zip \
    php-mbstring \
    php-xml \
    unzip \
    git \
    apache2

#install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
#setup apache
COPY ./000-default.conf /etc/apache2/sites-available/
RUN a2enmod rewrite && a2enmod headers
#Copy files
COPY . /var/www/lessgo/
RUN chmod -R ugo+rw /var/www/lessgo/storage/*
WORKDIR /var/www/lessgo/
EXPOSE 80
CMD apachectl -D FOREGROUND
