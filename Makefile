.PHONY: features

analysis:
	./bin/phpcs src

dependencies:
	composer install

specs:
	./bin/kahlan

features:
	./bin/behat

format:
	./bin/phpcbf src
