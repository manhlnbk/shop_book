# cài đặt 
```sh
git clone ...
```

## tạo database local đặt tên laravel_shop

```sh
cp .env.windows .env
composer install --ignore-platform-reqs
php artisan key:generate
php artisan migrate
php artisan make:init-data
```