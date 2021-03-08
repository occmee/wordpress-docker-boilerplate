# /bin/sh

# 変数読み込み
source .env

# DB Backup
docker exec -it mysql-container sh -c 'mysqldump ${MYSQL_DATABASE} -u ${MYSQL_USER} -p${MYSQL_PASSWORD} 2> /dev/null' > ${DB_DUMP_FILE}
cp -f ${DB_DUMP_FILE} ${DB_DUMP_LATEST}

# ( mysqldump が終わるのを待つ )
echo 'waiting...'
sleep 3s

# dump したファイルを最新のバックアップとしてコピー
#cp -rf ${DB_DUMP_FILE} ${DB_DUMP_LATEST}

# ビルド
docker-compose build

# 停止
docker-compose down

# ( wordpress を volume マウントしている場合は削除 )
#rm -rf ./wordpress

# 起動 ( ./wordpress ディレクトリが作成される )
docker-compose up -d
