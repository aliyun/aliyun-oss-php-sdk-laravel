# Aliyun OSS Service Provider for Laravel 5

[![Build Status](https://travis-ci.org/aliyun/aliyun-oss-php-sdk-laravel.svg?branch=master)](https://travis-ci.org/aliyun/aliyun-oss-php-sdk-laravel)
[![Coverage Status](https://coveralls.io/repos/github/aliyun/aliyun-oss-php-sdk-laravel/badge.svg?branch=master)](https://coveralls.io/github/aliyun/aliyun-oss-php-sdk-laravel?branch=master)

## [README of English](https://github.com/aliyun/aliyun-oss-php-sdk-laravel/blob/master/README.md)

## Laravel项目中引用包

- 安装Laravel/Lumen，并新建Laravel/Lumen工程
- 在工程的 composer.json 中添加
    ```
    {
        "require": {
            "aliyuncs/aliyun-oss-php-sdk-laravel": "~1.2.0"
        }
    }
    ```
- 执行 `composer update`


## Laravel工程
- 修改 vendor/aliyun-oss/aliyun-oss-php-sdk-laravel/config/config.php
    ```
    return [
        'id' => 'your id',
        'key' => 'your key',
        'endpoint' => 'your endpoint',
        'bucket' => 'your bucket'
    ];
    ```
- 修改 config/app.php 注册 Aliyun OSS Service Provider.
    ```
    'providers' => array(
        // ...
        AliyunOss\Laravel\AliyunOssServiceProvider::class,
    )
    ```
- 在 config/app.php 增加 aliases.
    ```
    'aliases' => array(
        // ...
        'OSS' => AliyunOss\Laravel\AliyunOssFacade::class,
    )
    ```
- 修改routes/web.php为
    ```
    Route::get('/', function()
    {
        $client = App::make('aliyun-oss');
        $client->putObject("your bucket", "your object", "content you want to upload");
        $result = $client->getObject("your bucket", "your boject");
        echo $result;
    });
    ```

## Lumen工程

- 修改vendor/aliyun-oss/aliyun-oss-php-sdk-laravel/config/config.php
    ```
    return [
        'id' => 'your id',
        'key' => 'your key',
        'endpoint' => 'your endpoint',
        'bucket' => 'your bucket'
    ];
    ```
- 在bootstrap/app.php 中注册 Aliyun OSS Service Providers
    ```
    $app->register(AliyunOss\Laravel\AliyunOssServiceProvider::class);
    ```

- 修改 routes/web.php 为
    ```
    $app->get('/', function () use ($app) {
        $client = $app->make('aliyun-oss');
        $client->putObject('your bucket', 'your key',  "content you want to upload");
        $result = $client->getObject("your bucket", "your boject");
        echo $result;
    });
    ```

## 运行测试
- 设置环境变量
    ```
    export OSS_ENDPOINT=''
    export OSS_ACCESS_KEY_ID=''
    export OSS_ACCESS_KEY_SECRET=''
    export OSS_BUCKET=''
    ```

- 进入工程目录，执行 `php vendor/bin/phpunit`

## 协议
- [MIT](https://github.com/aliyun/aliyun-oss-php-sdk-laravel/blob/master/LICENSE.md)
