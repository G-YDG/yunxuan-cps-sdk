<?php

namespace YdgTest\YunxuanCpsSdk;

class SkuTest extends AbstractTest
{
    public function testList()
    {
        $response = $this->getApp()->sku->list([
            'request_id' => uniqid(),
            'page_index' => 1,
            'page_size' => 10
        ]);
        $this->assertIsSuccessResponse($response);
    }

    public function testScroll()
    {
        $response = $this->getApp()->sku->scroll([
            'request_id' => uniqid(),
            'scroll_id' => null,
            'page_size' => 10,
        ]);
        $this->assertIsSuccessResponse($response);
    }

    public function testDetail()
    {
        $sku = $this->getApp()->sku->list([
            'request_id' => uniqid(),
            'page_index' => 1,
            'page_size' => 1,
        ])['data']['data'][0];

        $response = $this->getApp()->sku->detail([
           'uniq_id' => $sku['uniq_id']
        ]);
        $this->assertIsSuccessResponse($response);
    }
}