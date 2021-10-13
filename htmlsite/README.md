# Sample container with static html site

## Requeriments

Docker, make

## Usage
You can control the local container with ```docker-compose``` commands, i.e. up, stop, start, down, etc. however, if available, the ```make``` utility can be used to simplify the usual operations.

- Build and launch container

```bash
$ make
```
- Build container image

```bash
$ make build
```
- Stop container and remove Image

```bash
$ make clean
```
