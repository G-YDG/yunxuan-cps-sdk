<?php

declare(strict_types=1);

namespace Ydg\YunxuanCpsSdk\Sku;

use Ydg\YunxuanCpsSdk\YunxuanClient;

class Sku extends YunxuanClient
{

    /**
     * 获取商品列表接口
     *
     * @param $params
     * @return array
     * @example params['request_id'] [必填]uuid（随机定义但不重复的字符串）
     * @example params['page_index'] [必填]页码
     * @example params['page_size'] [必填]每页包含条数，上限 60
     * @example params['product_source'] [选填]请求商品源，YMALL：云mall商品，OWN：第三方商品，ADQ：精选好货，ADQ_GAME：精选游戏，不填：全部商品
     * @example params['product_sub_source'] [选填]商品二级来源，可以填英文逗号分隔的串，以支持多选
     * @example params['category_level1_id'] [选填]一级类目ID
     * @example params['external_store_id'] [选填]店铺ID
     * @example params['merchant_id'] [选填]商家id
     * @example params['store_name'] [选填]店铺名称
     * @example params['external_spu_id'] [选填]spuID
     * @example params['external_spu_ids'] [选填]spuID列表，最大100个
     * @example params['external_sku_id'] [选填]skuID列表，最大100个
     * @example params['uniq_ids'] [选填]唯一主键列表，最大100个
     * @example params['keyword'] [选填]关键词：见商品名称、店铺名称、spuId、skuId、storeId
     * @example params['sku_stock_status'] [选填]库存状态：0：全部商品; 1:有库存 ；2: 无库存；为空则返回有库存商品
     * @example params['has_coupon'] [选填]是否有优惠券：1、有券；2、无券
     * @example params['coupon_id'] [选填]优惠券ID（营销-活动ID）
     * @example params['after_coupon_price_to'] [选填]商品券后价-上限
     * @example params['after_coupon_price_from'] [选填]商品券后价-下限
     * @example params['buy_price_to'] [选填]到手价-上限
     * @example params['buy_price_from'] [选填]到手价-下限
     * @example params['commission_rate_to'] [选填]佣金比例范围-上限
     * @example params['commission_rate_from'] [选填]佣金比例范围-下限
     * @example params['amount_coupon_from'] [选填]券面价范围-下限
     * @example params['amount_coupon_to'] [选填]券面价范围-上限
     * @example params['current_price_from'] [选填]现价范围-下限，需要大于或等于0.1元
     * @example params['current_price_to'] [选填]现价范围-上限
     * @example params['commission_amount_from'] [选填]佣金范围-下限
     * @example params['commission_amount_to'] [选填]佣金范围-上限
     * @example params['buy_commission_amount_from'] [选填]到手佣金范围-下限
     * @example params['buy_commission_amount_to'] [选填]到手佣金范围-上限
     * @example params['category_level_ids'] [选填]跨类目查询（最大支持10个）
     * @example params['category_level1_ids'] [选填]一级类目列表（最大支持10个）
     * @example params['category_level2_ids'] [选填]二级类目列表（最大支持10个）
     * @example params['category_level3_ids'] [选填]三级类目列表（最大支持10个）
     * @example params['catalog_ids'] [选填]数据仓库id，用于限定在某个仓库下搜索spuId，skuId等（最大支持10个）
     * @example params['bid'] [选填]使用标签能力时必填
     * @example params['include_tags'] [选填]商品必须包含指定的标签，指定多个标签时取交集
     * @example include_tags[]['tag_name'] [选填]标签名称。
     * @example include_tags[]['tag_value'] [选填]标签值。
     * @example params['exclude_tags'] [选填]商品不能包含指定的标签，指定多个标签时取并集
     * @example exclude_tags[]['tag_name'] [选填]标签名称。
     * @example exclude_tags[]['tag_value'] [选填]标签值。
     * @example params['collapsed'] [选填]若一个spuid下有多个skuid是否需要去重仅同步一个skuid，默认去重true，不去重是false
     * @example params['has_prop_info'] [选填]是否过滤productInfo规格属性&货号字段，1:过滤 0:不过滤   默认为0不过滤透出全部商品
     * @example params['sort'] [选填]排序类型：1、降序；0、升序
     * @example params['sort_name'] [选填]排序字段：1、sku_price商品原价（商品详情页面展示的划线价格）2、current_price商品现价（商品详情页面展示的销售价格）3、commission_rate佣金比例4、commission_amount佣金5、update_time最后更新时间6、amount_coupon券面额7、buy_price到手价8、buy_commission_amount到手佣金12、cps_sales_num, cps平台总销量13、cps_sales_num_last30d, cps平台30天内销量14、cps_sales_num_last7d, cps平台7天销量18、cps_sales_num_last1d, cps平台昨日销量19、cps_sales_num_today, cps平台今日销量（近实时每小时更新）
     *
     */
    public function list($params): array
    {
        return $this->json('/gateway/sku/list', $params);
    }

    /**
     * 批量获取商品接口
     *
     * @param $params
     *
     * @return array
     * @example params['request_id'] [必填]uuid（随机定义但不重复的字符串）
     * @example params['scroll_id'] [必填]第一页传空，第二页以后请求必须要带上，具体值为首次请求响应返回的scroll_id字段值
     * @example params['page_size'] [必填]每页包含条数，上限 60
     * @example params['product_source'] [选填]请求商品源，YMALL：云mall商品，OWN：第三方商品，不填：全部商品
     * @example params['product_sub_source'] [选填]商品二级来源
     * @example params['external_store_id'] [选填]店铺ID
     * @example params['merchant_id'] [选填]提供商品的商家id
     * @example params['keyword'] [选填]关键词：见商品名称、店铺名称、spuId、skuId、storeId、uniqId、品牌名
     * @example params['sku_stock_status'] [选填]库存状态：1：有库存；2：无库存
     * @example params['has_detail'] [选填]是否有详情：1：有；2：没有
     * @example params['has_coupon'] [选填]是否有优惠券：1、有券；2、无券
     * @example params['insert_time_from'] [选填]cps商品首次创建时间下限，unix毫秒级时间戳
     * @example params['insert_time_to'] [选填]cps商品首次创建时间上限，unix毫秒级时间戳
     * @example params['sku_price_to'] [选填]商品划线价-上限
     * @example params['sku_price_from'] [选填]商品划线价-下限，需要大于或等于0.1元
     * @example params['after_coupon_price_to'] [选填]商品券后价-上限
     * @example params['after_coupon_price_from'] [选填]商品券后价-下限
     * @example params['buy_price_to'] [选填]到手价-上限
     * @example params['buy_price_from'] [选填]到手价-下限
     * @example params['commission_rate_to'] [选填]佣金比例范围-上限
     * @example params['commission_rate_from'] [选填]佣金比例范围-下限
     * @example params['amount_coupon_from'] [选填]券面价范围-下限
     * @example params['amount_coupon_to'] [选填]券面价范围-上限
     * @example params['current_price_from'] [选填]现价
     * @example params['current_price_to'] [选填]现价
     * @example params['commission_amount_from'] [选填]佣金范围-下限
     * @example params['commission_amount_to'] [选填]佣金范围-上限
     * @example params['buy_commission_amount_from'] [选填]到手佣金范围-下限
     * @example params['buy_commission_amount_to'] [选填]到手佣金范围-上限
     * @example params['category_level_ids'] [选填]跨类目查询（最大支持50个）
     * @example params['category_level1_ids'] [选填]一级类目列表（最大支持50个）
     * @example params['category_level2_ids'] [选填]二级类目列表（最大支持50个）
     * @example params['category_level3_ids'] [选填]三级类目列表（最大支持50个）
     * @example params['bid'] [选填]由商品中台分配，使用标签能力时必填
     * @example params['include_tags'] [选填]商品必须包含指定的标签（最大支持10个），指定多个标签时取并集
     * @example include_tags[]['tag_name'] [选填]标签名称。
     * @example include_tags[]['tag_value'] [选填]标签值。
     * @example params['exists_tags'] [选填]商品必须包含指定的标签（最大支持10个），指定多个标签时取交集
     * @example exists_tags[]['tag_name'] [选填]标签名称。
     * @example exists_tags[]['tag_value'] [选填]标签值。
     * @example params['exclude_tags'] [选填]商品不能包含指定的标签（最大支持10个），指定多个标签时取并集
     * @example exclude_tags[]['tag_name'] [选填]标签名称。
     * @example exclude_tags[]['tag_value'] [选填]标签值。
     * @example params['has_prop_info'] [选填]是否过滤productInfo规格属性&货号字段，1:过滤 0:不过滤   默认为0不过滤透出全部商品
     *
     */
    public function scroll($params): array
    {
        return $this->json('/gateway/sku/scroll', $params);
    }

    /**
     * 获取商品详情接口
     *
     * @param $params
     *
     * @example params['request_id'] [必填]uuid（随机定义但不重复的字符串）
     * @example params['uniq_id'] [必填]列表接口返回的唯一商品键
     *
     * @return array
     */
    public function detail($params): array
    {
        return $this->json('/gateway/sku/detail', $params);
    }
}