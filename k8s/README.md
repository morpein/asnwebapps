# Sample Kubernetes deployments

## Requirements

Kubernetes cluster, e.g. DKS, minikube, microk8s, ...

## Deploy Samples
Just use `apply` command and select file or folder with k8s deployment instructions, e.g 

```bash
$ kubectl apply -f testapp/
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
