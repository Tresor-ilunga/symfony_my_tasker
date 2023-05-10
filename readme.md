# MyTasker

MyTasker est une application de gestion de tâches qui permet à l'utilisateur de créer, organiser et suivre les tâches à accomplir. L'application offre une expérience utilisateur simple et efficace pour la gestion quotidienne de tâches.

## Environnement de développement

### Pré-requis

* PHP 8.1
* Composer
* Symfony CLI
* Docker et Docker-compose

Vous pouvez vérifier les pré-requis (sauf Docker et Docker-compose) avec la commande suivante (de la CLI Symfony) : 

```bash
symfony check:requirements
```

### Lancer l'environnement de développement

```bash
docker-compose up -d
```

## Lancer des tests

```bash
php bin/phpunit --testdox
```