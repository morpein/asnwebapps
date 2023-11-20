# Sample Kubernetes deployment with WAF service

## Warnings

* The WAF deployment uses an image compatible with linux/amd64. If other architecture is required, e.g. linux/arm64 (Apple series M), regenerate it using Dockefile on ../waf folder and change it on k8s deployment file.
