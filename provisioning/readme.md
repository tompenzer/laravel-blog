# Deployment to Amazon ECS

## Do the front-end build first
First, run the front-end production build in your local Docker environment. The
easiest way to do that is `./startup.sh production`.


## Create .env.production
Create a `.env.production` file by copying `.env.example`, and make the
following changes:
`APP_ENV=local` -> `APP_ENV=production`,
`APP_DEBUG=true` -> `APP_DEBUG=false`, (unless you want debug info)
`APP_URL=http://localhost:8000` -> `APP_URL=[insert production URL here]`,
`DB_HOST=mysql` -> `DB_HOST=[production DB host endpoint]`,
`DB_DATABASE=penzone` -> `DB_DATABASE=[production DB name]`,
`DB_USERNAME=root` -> `DB_USERNAME=[production DB user]`,
`DB_PASSWORD=secret` -> `DB_PASSWORD=[production DB password]`.


## Build images, push to Amazon ECR
These instructions assume you'll be storing the docker images on Amazon ECR
repositories. Instruction for configuring that can be found [here](https://docs.aws.amazon.com/AmazonECR/latest/userguide/docker-basics.html#use-ecr).

There's an example script `deploy.sh.example` to facilitate deployment of a
Docker image containing a built version of the app code in the case of the
`blog-server` image, or a configured nginx in the case of the `nginx` image,
to Amazon ECR repositories. You can run the following terminal commands to
create a copy of the deploy.sh script that we can customize:
```
$ cd provisioning
$ cp deploy.sh.example deploy.sh
```
Then open `provisioning/deploy.sh` in your editor, and replace all instances of
`[nginx image repository URI]` and `[blog-server image repository URI]` with the
respective repository URIs.

To run the deployment script for the blog-server image:
```
$ cd provisioning
$ ./deploy.sh
```

To run the deployment script for the nginx image:
```
$ cd provisioning
$ ./deploy.sh nginx
```


## Update ECS Tasks, Services
Once your updated images are pushed to Amazon ECR, you can create a new version
of your blog task definition to pull in the latest image version, update your
cluster service, and run the new version of the blog task.


## Initial Database Config
If using Amazon RDS, create a MySQL instance with the latest version in the 5.7
branch, and a database with the name and credentials you've entered into your
.env.production file. Make sure it has access to the security group used by the
blog EC2 instance.

You'll need to run the database migration upon creation of a new DB instance, to
enable logging in and posting content. You can SSH into your EC2 instance and
run the migrations as such, assuming you've configured your ssh client to
connect to ec2 domains using your private SSH key (otherwise it's
`ssh -i ~/.ssh/id_rsa ec2-user@...`, substituting the path to the private SSH
key you used for your AWS user account if different):
```
$ ssh ec2-user@[ec2 instance IP or assigned domain]
$ docker run --rm [blog-server image repository URI] php artisan migrate --seed
```
Once you've run the DB migrations, you should be able to log in with the same
credentials as in the `Usage` section of the main project `readme.md`. Once
you've logged in, it would be advisable to quickly change the admin account user
credentials to something more secure.
