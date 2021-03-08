# necomama-2020/docker

## 概要

docker-compose でローカル開発用の wordpress / mysql を 立ち上げるための基本設定です。

## 事前準備

#### docker-compose のインストール

- [Docker Desktop on Mac](https://docs.docker.com/docker-for-mac/install/) でインストールするのが簡単かと思います。

#### wp-config.php の用意

- ルートディレクトリ（ `docker/` ）の `src/` に `wp-config.php` を設置してください。

## 起動方法

1. 環境設定ファイル（ .env ）を用意する
2. wordpress の docker イメージをビルドする
3. docker-compose でコンテナを起動する
4. 起動した mysql にダンプデータを流し込む


上記の手順は、以下のコマンドで実行できます。

```
$ ./init.sh
```

## 動作確認

* http://localhost:5000/  # wordpress
* http://localhost:5001/  # phpMyAdmin

---

## 補足

### wp-config.php

* `wp-config.php` ファイルは、永続化のため、 `docker/src/` に置いたものをビルド時にコンテナに読み込む形にしてあります。したがって、`Dockerfile` や `wp-config.php` を更新した際には再ビルドが必要になります。

```
$ docker-compose down  # コンテナを起動している場合は停止
$ rm -rf ./wordpress # wordpressをVOLUMEマウントしている場合は削除
$ docker-compose build
$ docker-compose up -d
```

* もしくは、再ビルド用のスクリプトを（ `rebuild.sh` ）を用意したので、こちらを実行いただいてもOKです（DBのバックアップも合わせて行うスクリプトになってます）

```
$ ./rebuild.sh
```

### プラグイン

* プラグインの追加は、`Dockerfile` で行ってください。
* `Dockerfile` を更新したあとは、以下の手順で再ビルドをおこなってください。

```
$ docker-compose down  # コンテナを起動している場合は停止
$ rm -rf ./wordpress # wordpressをVOLUMEマウントしている場合は削除
$ docker-compose build
$ docker-compose up -d
```

### テーマ

*  `docker-compose.yml` でテーマのディレクトリ（ `../theme` ）をボリュームマウントしています。

``` docker-copmose.yml
  ...

  wordpress:
    ...
    volumes:
      - ../theme:/var/www/html/wp-content/themes/necomama
    ports: 
      ...
```