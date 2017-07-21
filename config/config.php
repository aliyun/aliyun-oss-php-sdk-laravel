<?php

use AliyunOss\Laravel\AliyunOssServiceProvider;

return [
    'id' => getenv('OSS_TEST_ACCESS_KEY_ID'),
    'key' => getenv('OSS_TEST_ACCESS_KEY_SECRET'),
    'endpoint' => getenv('OSS_TEST_ENDPOINT'),
    'bucket' => getenv('OSS_TEST_BUCKET')
];
