install:
	composer install

validate:
	composer validate

lint:
	composer exec --verbose phpcs -- --standard=PSR12 src bin
	
altlint:
	php phpcs.phar -- --standard=PSR12 src
