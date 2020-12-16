# Prebuild image in a temporary container
# Use the official maven/Java 11 image to create a build artifact.
# https://hub.docker.com/_/maven
FROM maven:3-openjdk-11 as builder

# Copy local code to the builder container image.
WORKDIR /app
COPY ./pom.xml .
COPY ./src ./src

# Build a release artifact.
RUN mvn package -DskipTests

## Container image
FROM openjdk:11

LABEL maintainer="jrbalsas@ujaen.es"

# Get app package in maven builder container
COPY --from=builder /app/target/*.jar ./app.jar

# Get app package from local 
#ARG JAR_FILE=target/*.jar
#COPY ${JAR_FILE} app.jar

#Default SB server port
ENV PORT=8080

EXPOSE 8080

ENTRYPOINT ["java","-Dserver.port=${PORT:8080}","-jar","/app.jar"]


