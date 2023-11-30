#!/bin/sh
echo "Copying .env.example to .env"
cp -f .env.example .env
echo "Done"
echo "Creating database"
touch /var/www/html/database/articles.sqlite
echo "Done"
echo "Create the database tables and seed them"
php artisan migrate --seed
echo "Done"

