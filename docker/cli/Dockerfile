FROM modicn/php-dev:7.4.10-cli-alpine

# 使用 dev 用户运行 PHP-FPM 工作进程
ARG DEV_GID
ARG DEV_UID

RUN if [ -z "`getent group ${DEV_GID}`" ]; then \
        addgroup -S -g ${DEV_GID} dev; \
    fi && \
    adduser -S -D -u ${DEV_UID} -G `getent group ${DEV_GID} | cut -d: -f1` dev

# 设置 Composer 工作目录
ENV COMPOSER_HOME /run/composer
RUN mkdir $COMPOSER_HOME && \
    chown ${DEV_UID}:${DEV_GID} $COMPOSER_HOME

RUN cp /usr/local/etc/php/php.ini-development /usr/local/etc/php/php.ini

COPY ./phpxdbg /usr/local/bin/phpxdbg

WORKDIR /code
