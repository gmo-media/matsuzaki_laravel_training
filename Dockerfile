# ベースイメージを指定
FROM php:8.2-fpm

# 必要なライブラリをインストール
RUN apt-get update && apt-get install -y \
    build-essential \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    git \
    curl

# PHP拡張機能のインストール
RUN docker-php-ext-install pdo pdo_mysql mbstring exif pcntl bcmath gd

# Composerをインストール
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# 作業ディレクトリを指定
WORKDIR /var/www

# 権限の設定
RUN chown -R www-data:www-data /var/www

# ポートの公開
EXPOSE 9000

CMD ["php-fpm"]
