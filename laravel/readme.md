# Setup

```bash
cp .env.example .env
echo 1 > version
composer install
php artisan key:generate
npm install
rockety build; rockety watch
```
