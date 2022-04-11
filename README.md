# Str

## Install dependencies

```
docker run --rm --interactive --tty --volume $(pwd):/app composer install
```

## Run a single unit test

```
docker run -it --rm -v $(pwd):/app -w /app php:8.1.4-cli ./vendor/bin/phpunit --do-not-cache-result
```

## Run code sniffer

```
docker run --rm -v $(pwd):/data cytopia/phpcs --standard=PSR12 src
```