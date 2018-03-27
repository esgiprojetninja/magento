FROM debian:jessie

MAINTAINER Disko <tech@disko.fr>

ARG APP_PROJECT_DIR_NAME

VOLUME /var/www/project

RUN echo Europe/Paris | tee /etc/timezone && dpkg-reconfigure --frontend noninteractive tzdata
