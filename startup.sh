cp .env.example .env

docker-compose run --rm --no-deps blog-server composer install

docker-compose run --rm --no-deps blog-server php artisan key:generate

docker run --rm -it -v $(pwd):/app -w /app node yarn install

docker-compose up -d

# If 'production' is passed as the first argument, build front-end in production
# mode and don't apply DB migrations/seeds.
if [ "$1" == 'production' ]; then
  docker run --rm -it -v $(pwd):/app -w /app node yarn run production
else
  docker run --rm -it -v $(pwd):/app -w /app node yarn run dev

  docker-compose run --rm blog-server php artisan migrate --seed
fi
