# Sample containers with Insecure Web Apps

Playing with containers

## Usage
````
$ cd appfolder
````
* Option 1

````
$ make
````

* Option 2

````
$ docker-compose up -d
$ docker-compose ps
````

## Bonus: access docker for windows with kubernetes from Ubuntu WSL

Copy ``wslinit.sh`` to your windows home folder and launch it from WSL to use ``docker`` and ``kubectl`` clients, e.g. 

````
$ cd /mnt/c/Users/youruser
$ source ./wslinit.sh
````
