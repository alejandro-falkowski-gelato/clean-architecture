-include .$(env).sh

.PHONY: features

analysis:
	./bin/phpcs src

dependencies:
	composer install

specs:
	./bin/kahlan --reporter=verbose

features:
	./bin/behat --verbose

format:
	./bin/phpcbf src spec features

migrate-db:
	./bin/phinx migrate -e $(env)

create-db:
	createdb $(PHINX_DB_NAME)

drop-db:
	dropdb $(PHINX_DB_NAME)

create-migration:
	bin/phinx create $(name)
