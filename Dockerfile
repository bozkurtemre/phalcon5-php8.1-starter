FROM --platform=linux/amd64 centos:7

WORKDIR /var/www/html

ENV COMPOSER_ALLOW_SUPERUSER=1

RUN yum update -y --nogpgcheck && \
    yum install -y --nogpgcheck epel-release yum-utils && \
    yum install -y --enablerepo=epel ImageMagick ImageMagick-devel dpkg dpkg-dev && \
    rpm -qa | grep -q remi-release || rpm -Uvh http://rpms.remirepo.net/enterprise/remi-release-7.rpm && \
    sed -i "s|enabled=1|enabled=0|" /etc/yum/pluginconf.d/fastestmirror.conf && \
    yum-config-manager --enable remi-php81 && \
    yum --enablerepo=remi-php81,remi install -y --nogpgcheck gcc git git-core make libev-devel zlib zlib-devel \
        openssl openssl-devel wget vim nano htop gzip zip unzip nc openssh openssh-clients openssh-server \
        bind-utils netstat telnet rsyslog tcpdump cronie jpegoptim pngquant ntp ntpdate net-tools python36-pip \
        jq gdb memcached supervisor nginx php php-fpm php-mysqlnd php-devel php-pear \
        php-gd php-xml php-gmp php-json php-soap php-mcrypt php-bcmath php-mbstring php-intl php-opcache \
        php-pecl-psr php-phalcon5-5.6.0 php-pecl-redis php-pecl-imagick php-pecl-imagick-devel \
        php-pecl-zip php-pecl-xdebug php-pecl-memcached php-pecl-apcu && \
    rm -rf /etc/nginx/conf.d/default.conf && \
    rm -rf /etc/nginx/conf.d/ssl.conf && \
    rm -rf /etc/nginx/conf.d/virtual.conf && \
    rm -rf /etc/nginx/nginx.conf && \
    curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer && \
    mkdir /run/php-fpm && export LC_ALL=en_US.UTF-8

RUN TMPDIR=/tmp yum clean metadata && TMPDIR=/tmp yum clean all

CMD ["./docker/init.sh"]
