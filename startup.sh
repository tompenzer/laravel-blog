cp .env.example .env

docker-compose run --rm --no-deps blog-server composer install

docker-compose run --rm --no-deps blog-server php artisan key:generate

docker run --rm -it -v $(pwd):/app -w /app node yarn install

docker-compose up -d

docker run --rm -it -v $(pwd):/app -w /app node yarn run dev

docker-compose run --rm blog-server php artisan migrate --seed
