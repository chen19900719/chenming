<?php

namespace App\Http\Middleware;

use App\Modules\Manage\Models\ManageModel;
use Closure;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Route;

class Role
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $route = Route::currentRouteName();
        $route1 = $request->getRequestUri();
        $manage = Session::get('user');
        $user = ManageModel::with('roles')->where('id', $manage->id)->first();
        $user['roles'] = $user['roles'][0];
        if ($user['roles']['id'] == 1) {
            return $next($request);
        }
        if ($route1 == '/manage') {
            return $next($request);
        }
        if ($user['roles']['id'] != 1) {
            if (!$manage->can($route)) {
                abort(404);
            }
            if ($manage->can($route)) {
                return $next($request);
            }
        }
//        dd($manage->can($route));
//        die;

//        if ($route == '/manage') {
//            return $next($request);
//        }
//        if (!$user->can($route)) {
//            return redirect()->back()->with(['message' => '没有权限']);
//        }


    }
}
