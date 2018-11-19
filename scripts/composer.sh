docker run --rm -v application:/app composer/composer install --ignore-platform-reqs

# cp .env.example .env
# docker-compose exec php ./artisan  key:generate