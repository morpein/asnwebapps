FROM node:14-alpine
LABEL MAINTAINER=jrbalsas@ujaen.es

WORKDIR /app

COPY src/package*.json ./

RUN npm install npm@latest -g

RUN npm install

COPY src/ ./

#ENV PORT=4000
EXPOSE 3000

ENTRYPOINT ["node","server.js"]

