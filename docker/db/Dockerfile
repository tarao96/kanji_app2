FROM mysql:8.0.30

# 設定ファイルの上書き
COPY /docker/db/my.cnf /etc/mysql/conf.d
RUN chmod 644 /etc/mysql/conf.d

RUN microdnf update -y \
    && microdnf install -y glibc-locale-source \
    && localedef -i ja_JP -c -f UTF-8 -A /usr/share/locale/locale.alias ja_JP.UTF-8

ENV LANG ja_JP.UTF-8
ENV LC_ALL ja_JP.UTF-8
ENV TZ "Asia/Tokyo"

CMD ["mysqld"]