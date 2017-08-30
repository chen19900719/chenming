<?php

class CommonClass
{
    /**
     * 合同样式
     * @return array
     */
    static function contractType()
    {
        return array(
            '1' => '标准合同',
            '2' => '技术开发合同',
            '3' => '商业合同',
        );
    }

    /**
     * 支付方式
     * @return array
     */
    static function payType()
    {
        return array(
            '1' => '一次性支付',
            '2' => '50:50',
            '3' => '50:30:20',
            '4' => '自定义'
        );
    }

    /**
     * 报价方式
     * @return array
     */
    static function paySay()
    {
        return array(
            '1' => '平台报价',
            '2' => '对方报价'
        );
    }

}