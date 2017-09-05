# AliCloud OSS Service Provider for Laravel 5

[![Build Status](https://travis-ci.org/aliyun/aliyun-oss-php-sdk-laravel.svg?branch=master)](https://travis-ci.org/aliyun/aliyun-oss-php-sdk-laravel)
[![Coverage Status](https://coveralls.io/repos/github/aliyun/aliyun-oss-php-sdk-laravel/badge.svg?branch=master)](https://coveralls.io/github/aliyun/aliyun-oss-php-sdk-laravel?branch=master)

## [README of Chinese](https://github.com/aliyun/aliyun-oss-php-sdk-laravel/blob/master/README-CN.md)

## Make a Reference in Your Laravel Project
- Install the Laravel framework or the Lumen framework.
- Create a Laravel or Lumen project, depending on the framework you have installed.
- In the composer.json file of the new project, insert the following code:
    ```
    {
        "require": {
            "aliyuncs/aliyun-oss-php-sdk-laravel": "~1.2.0"
        }
    }
    ```

- Run the following command: `composer update`

##  For the Laravel Project

- Edit the vendor/aliyun-oss/aliyun-oss-php-sdk-laravel/config/config.php file as follows:
    ```
    return [
        'id' => 'your id',
        'key' => 'your key',
        'endpoint' => 'your endpoint',
        'bucket' => 'your bucket'
    ];
    ```

- Edit the config/app.php file and register OSS Service Provider:
    ```
    'providers' => array(
        // ...
        AliyunOss\Laravel\AliyunOssServiceProvider::class,
    )
    ```

-  Edit the config/app.php file to insert an aliases segment.
    ```
    'aliases' => array(
        // ...
        'OSS' => AliyunOss\Laravel\AliyunOssFacade::class,
    )
    ```

-  Edit the routes/web.php file as follows:
    ```
    Route::get('/', function()
    {
        $client = App::make('aliyun-oss');
        $client->putObject("your bucket", "your object", "content you want to upload");
        $result = $client->getObject("your bucket", "your boject");
        echo $result;
    });
    ```

## For the Lumen Project
- Edit the vendor/aliyun-oss/aliyun-oss-php-sdk-laravel/config/config.php file as follows:
    ```
    return [
        'id' => 'your id',
        'key' => 'your key',
        'endpoint' => 'your endpoint',
        'bucket' => 'your bucket'
    ];
    ```

- Edit the bootstrap/app.php file and register OSS Service Providers:
    ```
    $app->register(AliyunOss\Laravel\AliyunOssServiceProvider::class);
    ```

- Edit the routes/web.php file as follows:
    ```
    $app->get('/', function () use ($app) {
        $client = $app->make('aliyun-oss');
        $client->putObject('your bucket', 'your key',  "content you want to upload");
        $result = $client->getObject("your bucket", "your boject");
        echo $result;
    });
    ```

## Run the Test Case
- Set the following environment variables:
```
export OSS_ENDPOINT=''
export OSS_ACCESS_KEY_ID=''
export OSS_ACCESS_KEY_SECRET=''
export OSS_BUCKET=''
```

- Switch to the project directory and run the following command: `php vendor/bin/phpunit`

## License
- [MIT](https://github.com/aliyun/aliyun-oss-php-sdk-laravel/blob/master/LICENSE.md)
