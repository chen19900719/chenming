<?php
return [

	// 安全检验码，以数字和字母组成的32位字符。
	'key' => 'wzn723ysa5qotelr2jcau4b7edb1livt',

	//签名方式
	'sign_type' => 'MD5',

	// 服务器异步通知页面路径。
	'notify_url' => 'http://demo.kppw.cn/order/pay/alipay/notify',

	// 页面跳转同步通知页面路径。
	'return_url' => 'http://demo.kppw.cn/order/pay/alipay/return'
];
