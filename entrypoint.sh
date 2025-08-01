#!/bin/bash

echo "🔁 Waiting for DB to be ready..."

# Testa conexão real com banco usando PHP inline
until php -r "
    try {
        new PDO(
            getenv('DB_CONNECTION') . ':host=' . getenv('DB_HOST') . ';port=' . getenv('DB_PORT') . ';dbname=' . getenv('DB_DATABASE'),
            getenv('DB_USERNAME'),
            getenv('DB_PASSWORD')
        );
        echo '✅ Connected to DB!';
    } catch (Exception \$e) {
        echo '⏳ DB not ready: ' . \$e->getMessage();
        exit(1);
    }
"; do
    echo ""
    sleep 5
done

echo ""
echo "🚀 Running migrations and seeds..."
php artisan migrate:fresh --seed --force

echo "📦 Starting Laravel server..."
php artisan serve --host=0.0.0.0 --port=8000
