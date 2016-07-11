FROM amp343/alpine-php

#
# copy the app into the container
#
COPY src .

#
# copy the site vhost conf
#
COPY apache/resource.conf /etc/apache2/conf.d

#
# let php read env vars
#
RUN echo "variables_order = \"EGPCS\"" >> /etc/php7/php.ini
RUN composer install
RUN mkdir /run/apache2

# ENTRYPOINT ping 8.8.8.8
ENTRYPOINT /usr/sbin/httpd -D FOREGROUND
