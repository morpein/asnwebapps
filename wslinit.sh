#!/bin/bash
# Author: jrbalsas@ujaen.es
# Date: October, 2019
# Thanks to Xander Grzywinski https://medium.com/@XanderGrzy/developing-for-docker-kubernetes-with-windows-wsl-9d6814759e9f

echo -e "\nConfigure Ubuntu WSL for accessing docker for windows and kubernetes\n" 
echo -e "Make sure to have docker for windows with kubernetes installed in your system and then launch this"
echo -e "script from WSL Ubuntu bash\n\n"

read -p "Do you want to continue? (y/n)" -n 1 -r

if [[ ! $REPLY =~ ^[Yy]$ ]]
then
 	echo -e "\n\nbye\n"
	exit 1
fi


sudo apt-get update

echo -e "\n\nInstalling Repositories\n"
echo -----------------------

#Docker CLI requirements https://docs.docker.com/install/linux/docker-ce/ubuntu/

sudo apt-get install -y \
    apt-transport-https \
    ca-certificates \
    curl \
    gnupg-agent \
    software-properties-common

curl -fsSL https://download.docker.com/linux/ubuntu/gpg | sudo apt-key add -

sudo add-apt-repository \
   "deb [arch=amd64] https://download.docker.com/linux/ubuntu \
   $(lsb_release -cs) \
   stable"

# Add kubernetes repo
curl -s https://packages.cloud.google.com/apt/doc/apt-key.gpg | sudo apt-key add -

sudo add-apt-repository 'deb https://apt.kubernetes.io/ kubernetes-xenial main'


sudo apt-get update

echo -e "\n\nInstalling Docker and Kubectl \n"
echo -----------------------
sudo apt-get install -y docker-ce-cli docker-compose kubectl

#enable access to docker for windows
EXPORTDOCKER="export DOCKER_HOST=tcp://localhost:2375"
echo $EXPORTDOCKER >> ~/.bashrc 
`$EXPORTDOCKER`

#Enable kubectl autompletion
source <(kubectl completion bash)
echo "source <(kubectl completion bash)">> ~/.bashrc

#Allow kubectl access config files to access kubernetes
cd; ln -s /c/Users/$(whoami)/.kube

#Fix WSL mount point for host units (e.g. /c instead of /mnt/c)
sudo bash -c 'cat > /etc/wsl.conf << EOF
[automount]
root = /
options = "metadata"
EOF'

echo -e "\n\nFinished\n"
echo -e "Remember to logout from windows and login again to finish the process\n\n"
echo -e "Enjoy\n\n"
