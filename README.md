*1)Download or clone the repository in your system.*

*2)Go to laravel-ajax-crud folder and open terminal then follow below steps.*


*Install or Update Composer:*
```
composer install/composer update
```

*Make a copy of .env.example file to .env:*
```
cp .env.example .env
```

*Set the database credentials:*

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=lara_crud_ajax
DB_USERNAME=root
DB_PASSWORD=
```

*Then Generate Application Key:*

```
php artisan key:generate
```

*Migrate database:*
```
php artisan migrate
```

*Clear cache by below command:*
```
php artisan optimize
```

*Start Server:*
```
php artisan serve
```

*Then Visit:*

http://127.0.0.1:8000/users
