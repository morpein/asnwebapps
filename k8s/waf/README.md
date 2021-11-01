
Modsecurity WAF container based on https://hub.docker.com/r/vshn/modsecurity

Read the user manual at the original site

## Changes
* Disable WAF checks on container health-check url, i.e. /healthz. It prevents false positives from Provider LoadBalancers IPs without reverse IP address resolution

