## Step - 1
Download or clone the repository in your system.

## Step - 2
go to laravel-ajax-crud folder and open terminal then run below command:

```
composer install

cp .env.example .env

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=lara_crud_ajax
DB_USERNAME=root
DB_PASSWORD=

php artisan key:generate

php artisan migrate

php artisan optimize

php artisan serve
```

Then hit http://127.0.0.1:8000/users you project will be run...

# Add on
performing crud operations with more fields..like checkboxes , drop downs , radios , image upload...
