
# 変数読み込み
source .env

# DB Restore
docker exec -i mysql-container mysql -u ${MYSQL_USER} -p${MYSQL_PASSWORD} ${MYSQL_DATABASE} -f < ${DB_DUMP_LATEST}
