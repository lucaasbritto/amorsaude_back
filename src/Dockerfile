FROM php:7.0-apache

# Ajusta fontes para o archive.debian.org
RUN sed -i 's|deb.debian.org|archive.debian.org|g' /etc/apt/sources.list \
 && sed -i 's|security.debian.org|archive.debian.org|g' /etc/apt/sources.list \
 && sed -i '/stretch-updates/d' /etc/apt/sources.list

# Configura o APT para aceitar repositórios sem InRelease e ignorar validade de Release
RUN echo 'Acquire::Check-Valid-Until "false";' > /etc/apt/apt.conf.d/99no-check-valid-until

# Atualiza e instala os pacotes necessários
RUN apt-get clean && \
    apt-get update -o Acquire::AllowInsecureRepositories=true \
                   -o Acquire::AllowDowngradeToInsecureRepositories=true && \
    apt-get install -y --no-install-recommends --allow-unauthenticated \
        git zip unzip curl libzip-dev libpng-dev && \
    docker-php-ext-install pdo pdo_mysql mbstring zip tokenizer && \
    apt-get clean && rm -rf /var/lib/apt/lists/*

# Habilita rewrite
RUN a2enmod rewrite

# Instala Composer globalmente
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Copia config do Apache
COPY .docker/vhost.conf /etc/apache2/sites-available/000-default.conf

# Script de inicialização
COPY .docker/start.sh /start.sh
RUN chmod +x /start.sh

WORKDIR /var/www/html

ENTRYPOINT ["/start.sh"]
