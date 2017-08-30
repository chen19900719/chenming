<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Socialite;

class TestController extends Controller
{


    public function qq()
    {
        return Socialite::with('qq')->redirect();
    }

    public function qqlogin()
    {
        $user = Socialite::driver('qq')->stateless()->user();
        dd($user);
        die;
    }

    public function weixin()
    {
//        return Socialite::with('weixinweb')->redirect();
        $clientId = env('WEIXINWEB_KEY');
        $clientSecret = env('WEIXINWEB_SECRET');
        $redirectUrl = env('WEIXINWEB_REDIRECT_URI');
        $config = new \SocialiteProviders\Manager\Config($clientId, $clientSecret, $redirectUrl);
        return Socialite::with('weixinweb')->setConfig($config)->redirect();
    }

    public function weixinlogin()
    {
        $user = Socialite::driver('weixinweb')->stateless()->user();
        return $user;
    }


}
