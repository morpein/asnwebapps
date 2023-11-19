# HAProxy ingress controller

* Source https://github.com/haproxytech/kubernetes-ingress/blob/master/deploy/haproxy-ingress.yaml

## Changes

* For deploy in DKE the original service type has been changed to LoadBalancer for exposing port 80 on localhost
* Added IngressClass support for selecting Ingress-Controllers from ingress resources

## Features

* Haproxy stats console Nodeport service available on port 1024