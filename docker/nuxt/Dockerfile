FROM node:lts-alpine

WORKDIR /var/www/html

RUN apk update && \
    apk upgrade && \
    apk add git python3 make && \
    npm install -g npm@latest nuxi nuxt3