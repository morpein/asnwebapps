# Access docker for windows with kubernetes from Ubuntu WSL1

Recent versions of Docker for windows have support and integration with WSL 2 on updated Windows 10 versions. However, previous version WSL1 requires to install docker and kubectl cli tools and do some tweaks to conect Docker engine from WSL console. The script ``wslinit.sh`` tries to fix it.

Copy ``wslinit.sh`` to your windows home folder and launch it from WSL to use ``docker`` and ``kubectl`` clients, e.g. 

````
$ cd /mnt/c/Users/youruser
$ source ./wslinit.sh
````
