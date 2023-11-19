# Sample Kubernetes deployments and resources

## Requirements

Kubernetes cluster, e.g. DKS, minikube, microk8s, ...

## Install local ingress controller

`ingress-controller` folder contains diferent ingress controlers for using ingress resources in local clusters, e.g. in Docker Kubernetes System, DKS; minikube...

Example, installing nginx ingress-controller

```bash
$ kubectl apply -f ingress-controller/nginx/
```

### Warnings

* Ingress controller may need some seconds to start before an ingress resource can be created
* Make sure to install only one of the controllers because all of them are configured to be used as default controllers, i.e. Not IngressClass option needed. Uninstall previous ingress controlled if you want to test a new one, e.g.

  ```
  kubectl delete -f ingress-controller/nginx
  kubectl apply -f ingress-controller/traefik
  ```

## Deploy Samples

After installing ingress controller, just use `apply` command and select file or folder with k8s deployment instructions, e.g 

```bash
$ kubectl apply -f testapp/
```

or

```bash
$ kubectl apply -f testapp-waf/
```

Check published NodePort to access web application, e.g.

```bash
$ kubectl get services -o wide
$ curl http://localhost:SERVICE_PORT/
```

## Delete samples

Use `delete` command with the same resource files/folders

```bash
$ kubectl delete -f testapp/
```
