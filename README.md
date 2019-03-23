# Laravel GitHub API

Consuming Github API using Laravel

### Installation

The project requires [Docker](https://www.docker.com/) >= 17.12 to run.

```sh
$ git clone repo-url
$ cd repo-folder/laradock
$ cp env-example .env
$ docker-compose up -d nginx
$ docker-compose exec workspace bash
$ composer install # run inside the container
$ cp .env.example .env # and it's done
```

### Unit Tests

To run the Unit Tests, run the following commands

```sh
$ cd repo-folder/laradock
$ docker-compose exec workspace bash
$ phpunit
```

### Endpoints

The application has the following resources

#### Get GitHub User Info

```
GET http://localhost/users/octocat

Content-Type: application/json
```

The response will be a JSON containing the user info.

```json
{
    "data": {
        "id": 583231,
        "login": "octocat",
        "name": "The Octocat",
        "avatar_url": "https://avatars3.githubusercontent.com/u/583231?v=4",
        "html_url": "https://github.com/octocat"
    }
}
```

#### Get GitHub User Repositories

```
GET http://localhost/users/octocat/repos

Content-Type: application/json
```

The response will be a JSON containing the user repositories.

```json
{
    "data": [
        {
            "id": 132935648,
            "name": "boysenberry-repo-1",
            "description": "Testing",
            "html_url": "https://github.com/octocat/boysenberry-repo-1"
        },
        {
            "id": 18221276,
            "name": "git-consortium",
            "description": "This repo is for demonstration purposes only.",
            "html_url": "https://github.com/octocat/git-consortium"
        }
    ]
}
```