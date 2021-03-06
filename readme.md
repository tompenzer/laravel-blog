# ThePenzone.com blog repository

The source for the blog [ThePenzone.com](http://thepenzone.com), repo hosted at
https://github.com/tompenzer/penzone. Largely a fork of
https://github.com/guillaumebriday/laravel-blog, with the front-end package
manager changed from NPM to Yarn, user self-registration disabled, social
features (comments, liking) disabled, some additions to user profiles, and added
contact form functionality. There are also some changes made to the Docker
provisioning to facilitate production deployment to Amazon ECS and other Docker
hosting providers.


## Installation

Development environment requirements:
- [Git](https://git-scm.com/) - on Mac, you will be prompted to install the CLI
dev tools including `git` upon attempting to `git clone` in the command below if
you don't already have it installed.
- [Docker](https://store.docker.com/search?offering=community&type=edition) - On
Mac, you can download the installer directly without needing a Docker account
[here](https://download.docker.com/mac/stable/Docker.dmg). For Windows, it's
available [here](https://download.docker.com/win/stable/Docker%20for%20Windows%20Installer.exe).

Clone the repo and start up the development environment using the terminal on
your local machine:
```
$ git clone git@github.com:tompenzer/penzone.git
$ cd penzone
$ ./startup.sh
```

## Note - potential sql error
If you get a DB PDO error at the end of the startup process, try connecting to
the docker mysql image server with any SQL client (i.e. Sequel Pro if you're on
a Mac), with the following credentials:
```
host: 0.0.0.0
port: 3306
user: root
pass: secret
```

And then try running the database migrations manually:
```
$ docker-compose run --rm blog-server php artisan migrate --seed
```

This will create the default admin user that you can use to sign in.


## Usage

The dev env site should be accessible in your web browser at the following URL:

http://localhost:8000

You can use the following credentials to log in, so you can create users and
posts:
```
Email: admin@example.com
Password: admin
```

You can use the admin dashboard section to configure users and content:

http://localhost:8000/admin/dashboard


## Cleaning up and stopping the dev environment

To have docker take down the server container, wipe the built docker images, and
erase the database cache, ensuring a fresh build next time, run the following
command from inside the project directory:
```
$ ./destroy.sh
```


## MediaLibrary - Local vs Amazon S3 storage

The .env.example file is currently configured to use local storage for the
MediaLibrary component (used for image gallery creation, attachment to users,
posts). If you would prefer to store media in Amazon s3, you can set the
`MEDIALIBRARY_FILESYSTEM_DRIVER` key to `s3` in the appropriate `.env` file(s).


## Building blog server Docker image

An example of building the blog server docker image for this project, with tags
for a version 1.0.0/latest release:
```
$ docker build -f provisioning/blog_server/development/Dockerfile -t tompenzer/penzone:1.0.0 -t tompenzer/penzone:latest -t tompenzer/penzone:1 -t tompenzer/penzone:1.0 .
```


## Starting the docker environment in production Mode

If you pass the word `production` as an argument to `startup.sh`, it'll build
the front-end in production mode and skip DB migrations:
```
$ ./startup.sh production
```


## Deploying to production

See the readme.md file in the `provisioning` directory for instructions on
production deployment.


## ReadMe from guillaumebriday/laravel-blog including API documentation follows:

# Laravel 5.6 blog

[![Build Status](https://travis-ci.org/guillaumebriday/laravel-blog.svg?branch=master)](https://travis-ci.org/guillaumebriday/laravel-blog)
[![Donate](https://img.shields.io/badge/Donate-PayPal-green.svg)](https://www.paypal.me/guillaumebriday)

The purpose of this repository is to show good development practices on [Laravel](http://laravel.com/) as well as to present cases of use of the framework's functionalities like :

- [Authentication](https://laravel.com/docs/5.6/authentication)
- API
  - Token authentication
  - [API Resources](https://laravel.com/docs/5.6/eloquent-resources)
  - Versioning
- [Blade](https://laravel.com/docs/5.6/blade)
- [Broadcasting](https://laravel.com/docs/5.6/broadcasting)
- [Cache](https://laravel.com/docs/5.6/cache)
- [Filesystem](https://laravel.com/docs/5.6/filesystem)
- [Helpers](https://laravel.com/docs/5.6/helpers)
- [Jobs & Queues](https://laravel.com/docs/5.6/queues)
- [Localization](https://laravel.com/docs/5.6/localization)
- [Mail](https://laravel.com/docs/5.6/mail)
- [Migrations](https://laravel.com/docs/5.6/migrations)
- [Policies](https://laravel.com/docs/5.6/authorization)
- [Providers](https://laravel.com/docs/5.6/providers)
- [Requests](https://laravel.com/docs/5.6/validation#form-request-validation)
- [Seeding & Factories](https://laravel.com/docs/5.6/seeding)
- [Testing](https://laravel.com/docs/5.6/testing)

Beside Laravel, this project uses other tools like :

- [Bootstrap 4](https://getbootstrap.com/)
- [PHP-CS-Fixer](https://github.com/FriendsOfPhp/PHP-CS-Fixer)
- [Travis CI](https://travis-ci.org/)
- [Font Awesome](http://fontawesome.io/)
- [Vue.js](https://vuejs.org/)
- [axios](https://github.com/mzabriskie/axios)
- [Redis](https://redis.io/)
- [spatie/laravel-medialibrary](https://github.com/spatie/laravel-medialibrary)
- Many more to discover.

## Some screenshots

You can find some screenshots of the application on : [https://imgur.com/a/Jbnwj](https://imgur.com/a/Jbnwj)

## Installation

Development environment requirements :
- [Docker](https://www.docker.com)
- [Docker Compose](https://docs.docker.com/compose/install/)

Setting up your development environment on your local machine :
```
$ git clone https://github.com/guillaumebriday/laravel-blog.git
$ cd laravel-blog
$ cp .env.example .env
$ docker-compose run --rm --no-deps blog-server composer install
$ docker-compose run --rm --no-deps blog-server php artisan key:generate
$ docker run --rm -it -v $(pwd):/app -w /app node npm install
$ docker-compose up -d
```

Now you can access the application via [http://localhost:8000](http://localhost:8000).

**There is no need to run ```php artisan serve```. PHP is already running in a dedicated container.**

## Before starting
You need to run the migrations with the seeds :
```
$ docker-compose run --rm blog-server php artisan migrate --seed
```

This will create a new user that you can use to sign in :
```
Email : darthvader@deathstar.ds
Password : 4nak1n
```

And then, compile the assets :
```
$ docker run --rm -it -v $(pwd):/app -w /app node npm run dev
```

## Useful commands
Seeding the database :
```
$ docker-compose run --rm blog-server php artisan db:seed
```

Running tests :
```
$ docker-compose run --rm blog-server ./vendor/bin/phpunit
```

Running php-cs-fixer :
```
$ docker-compose run --rm --no-deps blog-server ./vendor/bin/php-cs-fixer fix --config=.php_cs --verbose --dry-run --diff
```

Generating backup :
```
$ docker-compose run --rm blog-server php artisan backup:run
```

Generating fake data :
```
$ docker-compose run --rm blog-server php artisan db:seed --class=DevDatabaseSeeder
```

Starting job for newsletter :
```
$ docker-compose run blog-server php artisan tinker
> App\Jobs\PrepareNewsletterSubscriptionEmail::dispatch();
```

Discover package
```
$ docker-compose run --rm --no-deps blog-server php artisan package:discover
```

In development environnement, rebuild the database :
```
$ docker-compose run --rm blog-server php artisan migrate:fresh --seed
```

## Accessing the API

Clients can access to the REST API. API requests require authentication via token. You can create a new token in your user profil.

Then, you can use this token either as url parameter or in Authorization header :

```
# Url parameter
GET http://laravel-blog.app/api/v1/posts?api_token=your_private_token_here

# Authorization Header
curl --header "Authorization: Bearer your_private_token_here" http://laravel-blog.app/api/v1/posts
```

API are prefixed by ```api``` and the API version number like so ```v1```.

Do not forget to set the ```X-Requested-With``` header to ```XMLHttpRequest```. Otherwise, Laravel won't recognize the call as an AJAX request.

To list all the available routes for API :

```bash
$ docker-compose run --rm --no-deps blog-server php artisan route:list --path=api
```

## Broadcasting & WebSockets
Before using WebSockets, you need to set the `BROADCAST_DRIVER` in your `.env` file for Redis :

```txt
BROADCAST_DRIVER=redis
```

## More details

More details are available or to come on [Guillaume Briday's blog](https://blog.guillaumebriday.fr) (French).

## Contributing

Do not hesitate to contribute to the project by adapting or adding features ! Bug reports or pull requests are welcome.

## License

This project is released under the [MIT](http://opensource.org/licenses/MIT) license.
