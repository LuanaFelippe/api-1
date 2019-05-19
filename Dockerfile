#BASE
FROM alpine:3.9 as base

RUN apk update \
 && apk add php7 php7-zip php7-xml php7-pdo_mysql php7-json php7-tokenizer php7-session 

#DEPENDENCIES
FROM base as dependencies

COPY . /app

WORKDIR /app

RUN apk add composer \ 
 && composer install --no-interaction --no-dev

#CLI
FROM dependencies as cli

RUN apk add php7-dom php7-xmlwriter php7-posix \ 
 && composer install 

#APP
FROM base

COPY --from=dependencies /app /app

WORKDIR /app

CMD php -S 0.0.0.0:80 -t /app/public

EXPOSE 80
