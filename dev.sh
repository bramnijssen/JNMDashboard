#!/bin/bash

echo ">>> Installing (updated) PHP packages"
docker compose exec php composer install

# Check if .env exists, if not, copy example
ENV_FILE=".env"
ENV_EXAMPLE_FILE=".env.example"

if [ ! -f $ENV_FILE ]; then
  echo ">>> Copying $ENV_EXAMPLE_FILE to $ENV_FILE"
  docker compose exec php cp $ENV_EXAMPLE_FILE $ENV_FILE

  echo ">>> Generating app key"
  docker compose exec php php artisan key:generate

  echo "SET THE VARIABLES IN .ENV, RESTART DOCKER COMPOSE AND RUN THIS SCRIPT AGAIN"
  exit
fi

echo ">>> Migrating database"
docker compose exec php php artisan migrate

echo ">>> Installing (updated) JavaScript packages"
docker compose run --rm node npm install

echo ">>> Start Vite"
docker compose run --rm --service-ports node npm run dev