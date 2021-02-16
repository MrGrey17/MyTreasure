## <p aligin="center">Instruction for installing: </p>
    composer install
    edit .env
    chmod -R 775 bootstrap/cache
    chmod -R 777 storage
    php artisan key:generate
    php artisan storage:link
    npm install
    npm run dev or npm run watch
    php artisan serve

## <p aligin="center">For fake DB</p>
    php artisan migrate
    php artisan db:seed

## <p aligin="center">If faker->image will not work</p>

    vendor/fzaninotto/faker/src/Faker/Provider/Image.php
```php
public static function imageUrl($width = 640, $height = 480, $category = null, $randomize = false, $word = null, $gray = false)
{
    $baseUrl = "https://dummyimage.com/";
    $url = "{$width}x{$height}/";
    return $baseUrl . $url . "/ffffff/aaaaaa";
}
```


