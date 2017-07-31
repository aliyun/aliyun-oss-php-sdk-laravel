<?php namespace AliyunOss\Laravel\Test;

use AliyunOss\Laravel\AliyunOssFacade as AliyunOss;
use AliyunOss\Laravel\AliyunOssServiceProvider;
use Illuminate\Container\Container;

abstract class AliyunOssServiceProviderTest extends \PHPUnit_Framework_TestCase
{
    public function testRegisterAliyunsOssServiceProviderWithPackageConfigAndEnv()
    {
       $app = $this->setupApplication();
       $this->setupServiceProvider($app);

       $content = "abcd"; 
       $bucket = getenv('OSS_BUCKET');
       $app['aliyun-oss']->putObject($bucket, '1.txt', $content);
       $result = $app['aliyun-oss']->getObject($bucket, '1.txt');
       $this->assertEquals($result, $content);
  }

    public function testServiceNameIsProvided()
    {
        $app = $this->setupApplication();
        $provider = $this->setupServiceProvider($app);
        $this->assertContains('aliyun-oss', $provider->provides());
    }

    public function testVersionInformationIsProvidedToSdkUserAgent()
    {
        $app = $this->setupApplication();
        $this->setupServiceProvider($app);
        $config = $app['config']->get('aliyun-oss');

        $this->assertEquals(getenv('OSS_ACCESS_KEY_ID'), $config['id']);
        $this->assertEquals(getenv('OSS_ACCESS_KEY_SECRET'), $config['key']);
        $this->assertEquals(getenv('OSS_ENDPOINT'), $config['endpoint']);
        $this->assertEquals(getenv('OSS_BUCKET'), $config['bucket']);
    }

    /**
     * @return Container
     */
    abstract protected function setupApplication();

    /**
     * @param Container $app
     *
     * @return AliyusOssServiceProvider
     */
    private function setupServiceProvider(Container $app)
    {
        // Create and register the provider.
        $provider = new AliyunOssServiceProvider($app);
        $app->register($provider);
        $provider->boot();

        return $provider;
    }
}
