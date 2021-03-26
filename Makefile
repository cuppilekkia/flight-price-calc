start:
	docker-compose up --build -d

stop:
	docker-compose down

logs:
	docker-compose logs -f

build:
	docker-compose build

apish:
	docker-compose exec api /bin/sh

clientsh:
	docker-compose exec client /bin/sh

migrate-db:
	docker-compose exec api /bin/sh -c "php bin/console doctrine:migrations:migrate"
