# Created by Andre Agung Purnomo
# Use this for composer, php, and etc..
# Please dont change name service in docker-compose.yml
# Folder name just only use - for unique character
#!/bin/bash
SERVICE_NAME="_web_1"
FILEPATH=${PWD##*/}
FILEPATH=${FILEPATH//-}

RUN="$FILEPATH$SERVICE_NAME"

echo "Running bash in container $RUN"
docker exec -it $RUN bash
echo "Exit Script..."