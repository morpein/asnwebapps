# Simple deployment with an insecure webapp and a sql database

## Requeriments

Docker, docker-compose, make

## Usage
You can control the local container with ```docker-compose``` commands, i.e. up, stop, start, down, etc. however, if available, the ```make``` utility can be used to simplify the usual operations.

- Build and launch containers

```bash
$ make
```
- Monitor container resources

```bash
$ make mon
```
- Build containers images

```bash
$ make build
```
- Stop container and remove containers

```bash
$ make clean
```

## Options
- Database detailes, e.g. database name and user credentials can be customized in `docker-compose.yml` file
- Database must be initialized in url <http://localhost:8080/initdb.php>. It can take some time for mariadb container to initialize the database on the first launch