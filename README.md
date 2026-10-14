# FizzBuzz

Display the numbers from 1 to N, replacing multiples of 3 with "Fizz", multiples of 5 with "Buzz", and multiples of both 3 and 5 with "FizzBuzz". PHP 8.3, running in Docker.


```bash
docker compose run --rm php bin/fizzbuzz 15
```

## Environment

## Prerequisites

- [Docker](https://docs.docker.com/get-docker/) with Docker Compose (`docker compose`)

## Using

```bash
# install dependencies
docker compose run --rm php composer install

# run fizzbuzz
docker compose run --rm php bin/fizzbuzz 100

# run tests
docker compose run --rm php composer test

# static analysis
docker compose run --rm php composer analyse
docker compose run --rm php composer cs
docker compose run --rm php composer cs:fix

# all check
docker compose run --rm php composer check

# open a shell in the container
docker compose run --rm php bash
```
