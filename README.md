# yunxuan-cps-sdk

let php developer easier to access yunxuan cps api

Install the latest version with

```bash
$ composer require ydg/yunxuan-cps-sdk
```

## Basic Usage

```php
<?php

use Ydg\YunxuanCpsSdk\Yunxuan;

$app = new Yunxuan([
    'app_key' => 'your app_key',
    'app_secret' => 'your app_secret',
]);
$app->sku->list([
    'request_id' => uniqid(),
    'page_index' => 1,
    'page_size' => 10
]);
```