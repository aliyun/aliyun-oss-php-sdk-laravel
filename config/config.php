<?php

use AliyunOss\Laravel\AliyunOssServiceProvider;

return [
    'id' => getenv('OSS_ACCESS_KEY_ID'),
    'key' => getenv('OSS_ACCESS_KEY_SECRET'),
    'endpoint' => getenv('OSS_ENDPOINT'),
    'bucket' => getenv('OSS_BUCKET')
];
