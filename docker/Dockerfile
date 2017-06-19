FROM ubuntu:14.04

RUN DEBIAN_FRONTEND=noninteractive && \
    apt-get update && \
    apt-get -y install apache2 php5 php5-mysql php-gettext libapache2-mod-php5 curl php5-curl mc nano \
    git curl vim && \
    apt-get autoremove && \
    rm -rf /var/lib/apt/lists/*

RUN a2enmod rewrite

#RUN sed -i "s/short_open_tag = Off/short_open_tag = On/" /etc/php/7.0/apache2/php.ini
RUN sed -i "s/error_reporting = .*$/error_reporting = E_ERROR | E_WARNING | E_PARSE/" /etc/php5/apache2/php.ini

ENV APACHE_RUN_USER www-data
ENV APACHE_RUN_GROUP www-data
ENV APACHE_LOG_DIR /var/log/apache2
ENV APACHE_LOCK_DIR /var/lock/apache2
ENV APACHE_PID_FILE /var/run/apache2.pid

ADD 000-default.conf /etc/apache2/sites-enabled/000-default.conf

WORKDIR /var/www/html

EXPOSE 80
EXPOSE 8080


ENTRYPOINT /usr/sbin/apache2ctl -D FOREGROUND

CMD /bin/bash
