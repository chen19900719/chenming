<?php

return [

	// The default gateway to use
	'default' => 'paypal',

	// Add in each gateway here
	'gateways' => [
		'paypal' => [
			'driver'  => 'PayPal_Express',
			'options' => [
				'solutionType'   => '',
				'landingPage'    => '',
				'headerImageUrl' => ''
			]
		],
        'wechat' => [
            'driver' => 'WeChat_Express',
            'options' => [
                'appId' => 'wx6e023b7a4ee45709',
                'appKey' => 'yb1JrmlcZY31qOnBk2bBZiOBnwl37eBn',
                'mchId' => '1271185801'
            ]
        ],
        'WechatPay' => [
            'driver' => 'WechatPay_App',
            'options' => [
                'appId' => 'wxab43f78a83a5dd98',
                'apiKey' => 'zgdcVXdP3AO57zEUJCKA7JtfKFX3KF29',
                'mchId' => '1380675202'
            ]
        ]
	]

];