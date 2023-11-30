#!/bin/sh
build:
	docker image rm -f cornatul/articles.todayintel.com && docker build -t cornatul/articles.todayintel.com --no-cache --progress=plain . --build-arg CACHEBUST=$(date +%s)
dev:
	docker-compose -f docker-compose.yml up  --remove-orphans
down:
	docker-compose down
ssh:
	docker exec -it articles.todayintel.com /bin/bash
publish:
	docker push cornatul/articles.todayintel.com