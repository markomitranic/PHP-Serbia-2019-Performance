#!/bin/sh

set -e

docker kill $(docker ps -q) || true

docker-compose down && \
docker-compose build && \
docker-compose up
