<?php

namespace YdgTest\YunxuanCpsSdk;

class CommonTest extends AbstractTest
{
    public function testSearchOrders()
    {
        $response = $this->getApp()->common->searchOrders([
            'pageNum' => 1,
            'pageSize' => 10,
            'queryCriteria' => [
                'type' => 4,
                'start_time' => time() - 3600,
                'end_time' => time(),
            ]
        ]);
        $this->assertIsSuccessResponse($response);
    }

    public function testActivitySearch()
    {
        $response = $this->getApp()->common->activitySearch([
            'page' => [
                'no' => 1,
                'size' => 10,
            ],
        ]);
        $this->assertIsSuccessResponse($response);
    }

    public function testSearchSettleOrders()
    {
        $response = $this->getApp()->common->searchSettleOrders([
            'pageNum' => 1,
            'pageSize' => 10,
            'queryCriteria' => [
                'settle_month' => date('Y-m', strtotime('-1 month')),
            ]
        ]);
        $this->assertIsSuccessResponse($response);
    }
}