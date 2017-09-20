<?php

namespace App\Http\Controllers\Api\Mobile;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Shop\Address;
use App\Models\Shop\Customer;


class AddressController extends Controller
{
    /**
     * 地址列表
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    function index(Request $request)
    {
        $addresses = Address::where('customer_id', $request->customer_id)->get();
        return $addresses;
    }


    /**
     * 保存
     * @param Request $request
     * @return array
     */
    function store(Request $request)
    {
        $pca = explode(" ", $request->pca);
        Address::create([
            'customer_id' => $request->customer_id,
            'name' => $request->name,
            'province' => $pca[0],
            'city' => $pca[1],
            'area' => $pca[2],
            'tel' => $request->tel,
            'detail' => $request->detail,
        ]);
    }

    /**
     * 编辑
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    function edit($id)
    {
        $address = Address::find($id);
        return view('wechat.address.edit', compact('address'));
    }

    /**
     * 更新
     * @param Request $request
     * @param $id
     */
    function update(Request $request, $id)
    {
        $pca = explode(" ", $request->pca);

        Address::where('id', $id)
            ->update([
                'name' => $request->name,
                'province' => $pca[0],
                'city' => $pca[1],
                'area' => $pca[2],
                'tel' => $request->tel,
                'detail' => $request->detail,
            ]);
    }

    /**
     * 地址管理
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    function manage()
    {
        $addresses = Address::where('customer_id', session('wechat.customer.id'))->get();
        return view('wechat.address.manage', compact('addresses'));
    }


    /**
     * 设置默认地址
     * @param Request $request
     * @return array
     */
    function default_address(Request $request)
    {
        Customer::where('id', $request->customer_id)->update(['address_id' => $request->address_id]);
    }

    /**
     * 删除
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    function destroy($id)
    {
        Address::destroy($id);
        return back();
    }
}