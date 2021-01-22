## <p aligin="center">Instruction for installing: </p>
- composer install
- edit .env
- chmod -R 775 bootstrap/cache
- chmod -R 777 storage
- php artisan key:generate
- php artisan storage:link
## <p aligin="center">If you want create test database: </p>
- php artisan migrate
- php artisan db:seed