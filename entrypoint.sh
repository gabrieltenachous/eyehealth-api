#!/bin/bash

echo "🔁 Waiting for DB to be ready..."

# Aguarda banco responder (10 tentativas, 5s cada)
until php artisan db:connection --database=pgsql; do
  echo "⏳ Database not ready. Waiting..."
  sleep 5
done

echo "✅ Database connected!"

echo "🚀 Running migrations and seeds..."
php artisan migrate:fresh --seed --force

echo "📦 Starting Laravel server..."
php artisan serve --host=0.0.0.0 --port=8000
