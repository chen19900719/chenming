<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Socialite;

class TestController extends Controller
{
    public function qqlogin()
    {
        $user = Socialite::driver('qq')->stateless()->user();
        $accessTokenResponseBody = $user->accessTokenResponseBody;
       dd($user);die;
    }

    public function weixinlogin()
    {
        $user = Socialite::driver('weixinweb')->stateless()->user();
        dd($user);die;
    }
}
