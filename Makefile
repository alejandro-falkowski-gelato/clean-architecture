.PHONY: features

dependencies:
	composer install

specs:
	./bin/kahlan

features:
	./bin/behat
