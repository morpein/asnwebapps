FROM vshn/modsecurity
LABEL mantainer="jrbalsas@ujaen.es"

# Disable WAF on health-check url, i.e. /healthz

RUN echo 'SecRule REQUEST_URI "@beginsWith /healthz" "phase:1,id:40003,nolog,allow,ctl:auditEngine=Off"' \
    >> /opt/modsecurity/rules/before-crs.dist/cleanlogs.conf
