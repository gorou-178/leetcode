install:
	docker-compose build
	docker-compose run --rm php composer install
destroy:
	docker-compose down --rmi all --volumes
reinstall:
	@make destroy
	@make install
test:
	docker-compose run --rm php composer test

