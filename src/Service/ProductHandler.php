<?php

namespace App\Service;

class ProductHandler
{

    /**
     * 商品列表
     * @var array
     */
    public $products = [
        [
            'id' => 1,
            'name' => 'Coca-cola',
            'type' => 'Drinks',
            'price' => 10,
            'create_at' => '2021-04-20 10:00:00',
        ],
        [
            'id' => 2,
            'name' => 'Persi',
            'type' => 'Drinks',
            'price' => 5,
            'create_at' => '2021-04-21 09:00:00',
        ],
        [
            'id' => 3,
            'name' => 'Ham Sandwich',
            'type' => 'Sandwich',
            'price' => 45,
            'create_at' => '2021-04-20 19:00:00',
        ],
        [
            'id' => 4,
            'name' => 'Cup cake',
            'type' => 'Dessert',
            'price' => 35,
            'create_at' => '2021-04-18 08:45:00',
        ],
        [
            'id' => 5,
            'name' => 'New York Cheese Cake',
            'type' => 'Dessert',
            'price' => 40,
            'create_at' => '2021-04-19 14:38:00',
        ],
        [
            'id' => 6,
            'name' => 'Lemon Tea',
            'type' => 'Drinks',
            'price' => 8,
            'create_at' => '2021-04-04 19:23:00',
        ],
    ];

    /**
     * 计算商品总金额
     */
    public function countMoney()
    {
        $totalMoney = array_sum(array_column($this->products, 'price'));
        return $totalMoney; #143
    }


    /**
     * 商品金额排序（由大至小），并且返回类型为“dessert” 的商品
     */
    public function sortMoney()
    {
        #排序
        $goodsLists = $this->products;
        array_multisort(array_column($goodsLists, 'price'), SORT_DESC, $goodsLists);

        foreach ($goodsLists as $k => $v) {
            if ($v['type'] != 'Dessert') {
                unset($goodsLists[$k]);
            }
        }
        return $goodsLists;
    }


    /**
     * 转换时间日期类型(unix timestamp)
     */
    public function changeTimeType()
    {
        foreach ($this->products as &$v) {
            $v['create_at'] = strtotime($v['create_at']);
        }
        return $this->products;
    }
}