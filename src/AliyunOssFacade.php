<?php namespace AliyunOss\Laravel;

use AliyunOss\AliyunOssClientInterface;
use Illuminate\Support\Facades\Facade;

/**
 * Facade for the Aliyun Oss service
 *
 * @method static AliyunOssClient NewOssClient($name, array $args = []) Get a client from the service builder.
 */
class AliyunOssFacade extends Facade
{

    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'aliyun-oss';
    }

}
