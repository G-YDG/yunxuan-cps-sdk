<?php

declare(strict_types=1);

namespace Ydg\YunxuanCpsSdk\Common;

use Ydg\YunxuanCpsSdk\YunxuanClient;

class Common extends YunxuanClient
{

    /**
     * 转链接口(支持批量)
     *
     * @param $params
     *
     * @example params['saasId'] [选填]商家id
     * @example params['sharerId'] [选填]分销机构id
     * @example params['couponId'] [选填]优惠券id
     * @example params['url'] [选填]需要转链的链接
     * @example params['txCpsId'] [选填]自定义推广参数：分销机构 CPS追踪参数，供机构内部分佣使用，每个自定义推广参数需要保证唯一性；最大512个字符，只支持数字，大小写英文
     * @example params['productSource'] [选填]商品标识：2：单品推广，4：精选好货，5：精选游戏
     * @example params['skuId'] [选填]skuId，与warehouseId同时出现,可从商品列表或商品详情接口中获取（活动转链可从活动列表接口获取）
     * @example params['warehouseId'] [选填]商品数据源信息，与skuId同时出现，productSource=2 时必填，可从商品列表或商品详情接口中获取（活动转链可从活动列表接口获取）
     * @example params['materialType'] [选填]转链物料类型(0:商品【默认】,1:活动。与sku_id同时出现)
     * @example params['genAdvancedUrl'] [选填]是否生成Https、Deeplink、UniversalLink等链接，默认为false，非必要请勿传，目前仅支持京东、唯品会的单品转链，其中京东只返回Https链接。
     *
     * @return array
     */
    public function generateUrl($params): array
    {
        return $this->json('/gateway/generateUrl', $params);
    }

    /**
     * 订单查询接口
     *
     * @param $params
     *
     * @example params['pageNum'] [必填]页码，最小为1
     * @example params['pageSize'] [必填]每页长度，最大1000
     * @example params['queryCriteria']['type'] [必填]订单时间查询类型：1、创建时间 2、付款时间 3、完成时间 4、更新时间 5、结算时间
     * @example params['queryCriteria']['start_time'] [必填]查询开始时间，毫秒级时间戳
     * @example params['queryCriteria']['end_time'] [必填]查询结束时间，毫秒级时间戳
     * @example params['queryCriteria']['sharer_id'] [必填]分销机构id
     * @example params['queryCriteria']['order_no'] [选填]订单号
     * @example params['queryCriteria']['sku_id'] [选填]skuId
     * @example params['queryCriteria']['spu_id'] [选填]spuId
     * @example params['queryCriteria']['product_source'] [选填]商品标识：商品标识：2：单品推广，4：精选好货，5：精选游戏
     * @example params['queryCriteria']['promote_name'] [选填]推广位名称
     * @example params['queryCriteria']['tx_cps_id'] [选填]自定义推广参数
     *
     * @return array
     */
    public function searchOrders($params): array
    {
        return $this->json('/gateway/searchOrders', $params);
    }

    /**
     * 活动列表接口
     *
     * @param $params
     *
     * @example params['page'] [必填]分页信息
     * @example params['page']['no'] [必填]页码，最小为1
     * @example params['page']['size'] [必填]每页长度
     * @example params['query'] [选填]查询条件
     * @example params['query']['state'] [选填]活动状态：1：未开始，2：进行中，3：已结束
     * @example params['query']['activity_id_list'] [选填]活动id列表
     * @example params['query']['start_time'] [选填]查询开始时间，秒级时间戳
     * @example params['query']['end_time'] [选填]查询结束时间，秒级时间戳
     * @example params['query']['warehouse_id_list'] [选填]活动来源
     * @example params['productSource'] [选填]商品标识：2：代表第三方活动，3：代表枫叶活动，11：官网推广活动，默认为2
     * @example params['sort'] [选填]排序：field排序字段:id,start_time,end_time,asc是否升序
     * @example params['sort']['field'] [选填]排序字段:id,start_time,end_time
     * @example params['sort']['asc'] [选填]是否升序
     *
     * @return array
     */
    public function activitySearch($params): array
    {
        return $this->json('/gateway/activitySearch', $params);
    }

    /**
     * 结算订单查询接口
     *
     * @param $params
     *
     * @example params['pageNum'] [必填]页码，最小为1
     * @example params['pageSize'] [必填]每页长度
     * @example params['queryCriteria'] [必填]查询条件
     * @example params['queryCriteria']['sharer_id'] [必填]分销机构id
     * @example params['queryCriteria']['settle_month'] [选填]结算时间（结算时间与结算账单号至少传一个）
     * @example params['queryCriteria']['settle_order_no'] [选填]结算账单号（结算时间与结算账单号至少传一个）
     * @example params['queryCriteria']['settle_type'] [选填]结算类型
     *
     * @return array
     */
    public function searchSettleOrders($params): array
    {
        return $this->json('/gateway/searchSettleOrders', $params);
    }

    /**
     * 选品详情接口
     *
     * @param $params
     *
     * @example params['pageNum'] [必填]页码，最小为1
     * @example params['pageSize'] [必填]每页长度
     * @example params['queryCriteria'] [必填]查询条件
     * @example params['queryCriteria']['id'] [必填]选品库id
     * @example params['queryCriteria']['sort'] [选填]排序类型：默认为降序排列：1、降序；0、升序
     * @example params['queryCriteria']['take_coupon'] [选填]是否带券商品
     * @example params['queryCriteria']['sort_name'] [选填]排序名:1.sku_price商品划线价格 2.current_price商品现销售价格 3.commission_rate佣金比例 4.commission_amount佣金 5.amount_coupon 券面额
     *
     * @return array
     */
    public function getGoodsInfo($params): array
    {
        return $this->json('/gateway/getGoodsInfo', $params);
    }
}