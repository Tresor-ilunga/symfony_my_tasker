# MyTasker

MyTasker is a task management application that allows the user to create, organize and track tasks. The application offers a simple and efficient user experience for daily task management.

## Environment of development

### Pre-requisite

* PHP 8.1
* Composer
* Symfony CLI
* Docker and Docker-compose

You can check the prerequisites (except Docker and Docker-compose) with the following command (from the Symfony CLI):

```bash
symfony check:requirements
```

### Start the development environment

```bash
docker-compose up -d
```

## Run tests

```bash
php bin/phpunit --testdox
```