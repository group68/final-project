FROM mariadb:latest

ENV MYSQL_ROOT_PASSWORD="p" \
    MYSQL_USER="mysql_client" \
    MYSQL_PASSWORD="p" \
    LANG=C.UTF-8

COPY db-restaurant.sql /docker-entrypoint-initdb.d/

CMD ["--default-authentication-plugin=mysql_native_password"]