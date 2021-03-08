# /bin/sh

cp .env.sample .env
docker-compose build
docker-compose up -d
./scripts/restore.sh
