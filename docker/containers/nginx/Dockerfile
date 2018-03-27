FROM debian:jessie

MAINTAINER Disko <tech@disko.fr>

RUN apt-get update && apt-get install -y nginx nginx-extras vim

RUN mkdir /etc/nginx/cert

ADD cert/* /etc/nginx/cert/

ARG APP_PROJECT_TYPE

ADD nginx.conf /etc/nginx/
ADD vhost.${APP_PROJECT_TYPE}.conf /etc/nginx/sites-available/
ADD vhost.${APP_PROJECT_TYPE}_ssl.conf /etc/nginx/sites-available/

RUN ln -s /etc/nginx/sites-available/vhost.${APP_PROJECT_TYPE}.conf /etc/nginx/sites-enabled/vhost
RUN ln -s /etc/nginx/sites-available/vhost.${APP_PROJECT_TYPE}_ssl.conf /etc/nginx/sites-enabled/vhost_ssl
RUN rm /etc/nginx/sites-enabled/default

RUN echo "upstream php-upstream { server php:9000; }" > /etc/nginx/conf.d/upstream.conf

RUN usermod -u 1000 www-data

RUN echo Europe/Paris | tee /etc/timezone && dpkg-reconfigure --frontend noninteractive tzdata

CMD ["nginx"]

EXPOSE 80
EXPOSE 443
