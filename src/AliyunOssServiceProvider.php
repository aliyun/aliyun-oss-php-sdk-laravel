<?php namespace AliyunOss\Laravel;

use OSS\OssClient;
use OSS\Core\OssException;
use Illuminate\Foundation\Application as LaravelApplication;
use Illuminate\Support\ServiceProvider;
use Laravel\Lumen\Application as LumenApplication;

/**
 * AliyunOss SDK for PHP service provider for Laravel applications
 */
class AliyunOssServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = true;

    /**
     * Bootstrap the configuration
     *
     * @return void
     */
    public function boot()
    {
        $source = realpath(__DIR__ . '/../config/config.php');

        if ($this->app instanceof LaravelApplication && $this->app->runningInConsole()) {
            $this->publishes([$source => config_path('config.php')]);
        }
 
        $this->mergeConfigFrom($source, 'aliyun-oss');
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('aliyun-oss', function ($app) {
            $config = $app->make('config')->get('aliyun-oss');

            return new OssClient($config['id'],  $config['key'], $config['endpoint']);
        });

        $this->app->alias('aliyun-oss', 'OSS\OssClient');
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['aliyun-oss', 'OSS\OssClient'];
    }

}
