# Morele.net recruitment task

## About The Project

Movie search engine made as a recruitment task

### Built With

- [PHP](https://www.php.net/)
- [Symfony](https://symfony.com/)
- [Docker](https://www.docker.com/)
- [Compose](https://docs.docker.com/compose/)

## Getting Started

### Installation

Follow these simple steps

#### Clone API repository

```bash
git clone git@github.com:RyuuKodex/movie-search-engine.git
```

## Building environment for development

First things first you have to copy the development environment template. It' located in `.devcontainer`, I'd reccomend
to leave it there and create a symbolic link.

```shell
ln -s ./etc/envs/compose.dev.yaml .
mv compose.dev.yaml compose.override.yaml
```

Now we'll use `docker` to build our image locally, with local architecture:

```shell
docker compose build
```

It may take few seconds, when it's completed proceed with running the container:

```shell
docker compose up --detach
```

Remember that you have installed the vendors in an image, however while creating container you've replaced built app
folder with empty one (repository has no `vendor` folder intentionally). So, we have to proceed once again with app
configuration:

```shell
docker compose exec app bash -ce "
    composer install
    chown -R $(id -u):$(id -g) .
  "
```

Now you're all set, you can visit the [localhost with port 80](http://localhost), you should
see the Symfony default application web page.

# Endpoint

####

```http
  GET /api/movies/search?algorithm=<algorithm>

  List of algorithms:
  - random
  - startsWithW
  - moreThanOneWord
```

## Commands

#### Start the project

```bash
docker compose up -d
```

#### Connect to app container

```bash
docker compose exec app bash
```

#### Stop project

```bash
docker compose down --remove-orphans
```

#### CS-fixer

```bash
docker compose exec app composer run-lint-fix
```

#### PHP-Stan

```bash
docker compose exec app composer run-phpstan-analysis
```

### Testing

#### Unit
Use the command below to run unit tests.

```bash
docker compose exec app composer run-unit-tests
```
