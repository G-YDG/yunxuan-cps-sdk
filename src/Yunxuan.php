<?php

declare(strict_types=1);

namespace Ydg\YunxuanCpsSdk;

use Ydg\FoudationSdk\ServiceContainer;

/**
 * @property Common\Common $common
 * @property Category\Category $category
 * @property Sku\Sku $sku
 */
class Yunxuan extends ServiceContainer
{
    protected $providers = [
        Common\ServiceProvider::class,
        Category\ServiceProvider::class,
        Sku\ServiceProvider::class,
    ];
}