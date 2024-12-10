<?php

namespace YdgTest\YunxuanCpsSdk;

class CategoryTest extends AbstractTest
{
    public function testList()
    {
        $response = $this->getApp()->category->list([
            'request_id' => uniqid(),
            'page_index' => 1,
            'page_size' => 10
        ]);
        $this->assertIsSuccessResponse($response);
    }
}