FROM python:3-alpine3.9
LABEL MAINTAINER=jrbalsas@ujaen.es

WORKDIR /app

COPY requeriments.txt ./

RUN pip install -r requeriments.txt

COPY src/ ./

EXPOSE 5000

ENTRYPOINT ["python","server.py"]

