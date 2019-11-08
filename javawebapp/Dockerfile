# Prebuild image in a temporary container
# Use the official maven/Java 8 image to create a build artifact.
# https://hub.docker.com/_/maven
FROM maven:3.5-jdk-8-alpine as builder

# Copy local code to the container image.
WORKDIR /app
COPY ./src/pom.xml .
COPY ./src/src ./src

# Build a release artifact.
RUN mvn package -DskipTests

# Create container using war package created in temporary package
FROM tomcat:9.0-slim
MAINTAINER jrbalsas@ujaen.es

WORKDIR /usr/local/tomcat/webapps

RUN rm -fr *
#COPY ./src/target/javawebapp-1.0-SNAPSHOT.war ./ROOT.war
COPY --from=builder /app/target/javawebapp*.war ./ROOT.war

EXPOSE 8080


