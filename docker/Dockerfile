FROM wordpress:latest

# 必要なツール郡をインストール
RUN apt-get update
RUN apt-get -y install wget unzip

# WP プラグイン (zip) ダウンロード
WORKDIR /tmp/wp-plugins
RUN wget --no-check-certificate https://downloads.wordpress.org/plugin/contact-form-7.zip

# Zip ファイルを解凍してインストール
# cf. https://hacknote.jp/archives/42092/
RUN unzip './*.zip' -d /usr/src/wordpress/wp-content/plugins
RUN ls /usr/src/wordpress/wp-content/plugins

# 不要になった一時ファイルを削除
RUN apt-get clean
RUN rm -rf /tmp/*

# (for 'simply-static' plugin)
RUN mkdir /usr/src/wordpress/wp-content/uploads

# サーバが読めるように wp-content 以下の所有者を変更
RUN chown -R www-data:www-data /usr/src/wordpress/wp-content

# ローカルにある wp-config.php （設定済み）を、コンテナ内の /usr/src/wordpress/wp-config.php に上書き
ADD src/wp-config.php /usr/src/wordpress/wp-config.php
# self signed certificate 対策 (cf. https://olein-design.com/blog/wordpress-install-download-error-changed-class-http-file)
ADD src/wp-includes/class-http.php /usr/src/wordpress/wp-includes/class-http.php

WORKDIR /var/www/html
