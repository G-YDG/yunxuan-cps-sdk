<?php

namespace YdgTest\YunxuanCpsSdk;

use PHPUnit\Framework\TestCase;
use Ydg\YunxuanCpsSdk\Yunxuan;

abstract class AbstractTest extends TestCase
{
    protected static $app;

    public function getApp(): Yunxuan
    {
        if (!(self::$app instanceof Yunxuan)) {
            self::$app = new Yunxuan($this->getConfig());
        }
        return self::$app;
    }

    public function getConfig(): array
    {
        return [
            'app_key' => getenv('APP_KEY'),
            'app_secret' => getenv('APP_SECRET'),
        ];
    }

    public function assertIsSuccessResponse($response)
    {
        $this->assertIsArray($response);
        $this->assertArrayHasKey('success', $response);
        $this->assertTrue($response['success'] == true);
    }
}
