#!/usr/bin/env bash
set -e

composer install --quiet --no-interaction --no-progress
php artisan migrate
#php artisan migrate:fresh --seed --force

cd public
ln -s ../storage/app/public storage
