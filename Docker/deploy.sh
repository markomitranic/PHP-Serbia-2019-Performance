#!/bin/sh

set -e

docker-compose down
docker kill $(docker ps -q) || true

docker-compose build && \
docker-compose up
