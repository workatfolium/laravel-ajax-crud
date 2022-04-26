## Step - 1
Download or clone the repository in your system.

## Step - 2
Go to laravel-ajax-crud folder and open terminal then run below command:

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

<<<<<<< HEAD
Then hit http://127.0.0.1:8000/users you project will be run.
=======
Then hit http://127.0.0.1:8000/users you project will be run...

# Add on
performing crud operations with more fields..like checkboxes , drop downs , radios , image upload...
>>>>>>> baca67e4733e357f95f0d8d88108558e08c10501
