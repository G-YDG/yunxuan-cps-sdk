<?php

declare(strict_types=1);

namespace Ydg\YunxuanCpsSdk\Category;

use Ydg\YunxuanCpsSdk\YunxuanClient;

class Category extends YunxuanClient
{

    /**
     * 获取类目接口
     *
     * @param $params
     * @example params['request_id'] [必填]uuid（随机定义但不重复的字符串）
     * @example params['page_index'] [必填]页码
     * @example params['page_size'] [必填]每页包含条数，上限 60
     * @example params['parent_id'] [选填]父类目id，默认0：表示一级类目，其它值填类目节点id
     *
     * @return array
     */
    public function list($params): array
    {
        return $this->json('/gateway/category/list', $params);
    }
}