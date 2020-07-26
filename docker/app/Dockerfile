FROM ubuntu:18.04

MAINTAINER Ayon Khan

ARG DEBIAN_FRONTEND=noninteractive

RUN apt-get update \
    && apt-get install -y locales \
    && locale-gen en_US.UTF-8

ENV LANG en_US.UTF-8
ENV LANGUAGE en_US:en
ENV LC_ALL en_US.UTF-8

ENV TZ=UTC
RUN ln -snf /usr/share/zoneinfo/$TZ /etc/localtime && echo $TZ > /etc/timezone

RUN apt-get update && apt-get install -y software-properties-common \
    && add-apt-repository -y ppa:nginx/development \
    && add-apt-repository -y ppa:ondrej/php \
    && apt-get update \
    && apt-get install -y curl git sqlite3 supervisor unzip zip \
    && apt-get install -y nginx php-xdebug php7.3-bcmath php7.3-cli \
       php7.3-curl php7.3-fpm php7.3-gd php7.3-imap php7.3-mbstring \
       php7.3-mysql php7.3-redis php7.3-soap php7.3-sqlite3 php7.3-xml \
    && php -r "readfile('http://getcomposer.org/installer');" | php -- --install-dir=/usr/bin/ --filename=composer \
    && mkdir /run/php \
    && apt-get remove -y --purge software-properties-common \
    && apt-get -y autoremove \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* \
    && echo "daemon off;" >> /etc/nginx/nginx.conf \
    && ln -sf /dev/stdout /var/log/nginx/access.log \
    && ln -sf /dev/stderr /var/log/nginx/error.log

COPY default /etc/nginx/sites-available/default

COPY php-fpm.conf /etc/php/7.3/fpm/php-fpm.conf

EXPOSE 80

COPY supervisord.conf /etc/supervisor/conf.d/supervisord.conf

CMD ["/usr/bin/supervisord"]
