<?php

namespace App\Http\Controllers;


use GatewayWorker\Lib\Gateway;
use Illuminate\Http\Request;
use Auth;
use App\Message;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        Gateway::$registerAddress = '127.0.0.1:1238';
    }

    public function init(Request $request)
    {

        //绑定用户
        $this->bind($request);
        //在线用户
        $this->users();
        //历史记录
        $this->history();
        //进入聊天室了
        $this->login();

    }

    /**
     * 当前在线用户
     */
    private function users()
    {
        $data = [
            'type' => 'users',
            'data' => Gateway::getClientSessionsByGroup(session('room_id'))
        ];

        Gateway::sendToGroup(session('room_id'), json_encode($data));
    }

    /**
     * 绑定client_id 与 user id
     */
    private function bind($request)
    {
        $id = Auth::id();
        $client_id = $request->client_id;
        Gateway::bindUid($client_id, $id);
        //加入房间
        Gateway::joinGroup($client_id, session('room_id'));
        Gateway::setSession($client_id, [
            'id' => $id,
            'avatar' => Auth::user()->avatar,
            'name' => Auth::user()->name
        ]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $room_id = $request->room_id ? $request->room_id : '1';
        session()->put('room_id', $room_id);
        return view('home');
    }

    /**
     * 提示进入聊天室
     */
    private function login()
    {
        $data = [
            'type' => 'say',
            'data' => [
                'avatar' => Auth::user()->avatar,
                'name' => Auth::user()->name,
                'content' => '进入了聊天室',
                'time' => date("Y-m-d H:i:s", time())
            ]
        ];

        Gateway::sendToGroup(session('room_id'), json_encode($data));
    }

    public function say(Request $request)
    {
        $data = [
            'type' => 'say',
            'data' => [
                'avatar' => Auth::user()->avatar,
                'name' => Auth::user()->name,
                'content' => $request->input('content'),
                'time' => date("Y-m-d H:i:s", time())
            ]
        ];
        //私聊
        if ($request->user_id) {
            $data['data']['name'] = Auth::user()->name . ' 对 ' . User::find($request->user_id)->name . ' 说：';
            Gateway::sendToUid($request->user_id, json_encode($data));
            Gateway::sendToUid(Auth::id(), json_encode($data));

            //私聊信息，只发给对应用户，不存数据库了
            return;
        }

        Gateway::sendToGroup(session('room_id'), json_encode($data));

        //存入数据库，以后可以查询聊天记录
        Message::create([
            'user_id' => Auth::id(),
            'room_id' => session('room_id'),
            'content' => $request->input('content')
        ]);
    }

    private function history()
    {
        $data = ['type' => 'history'];
        $messages = Message::with('user')->where('room_id', session('room_id'))
            ->where('user_id', Auth::id())->orderBy('id', 'desc')->limit(5)->get();
        $data['data'] = $messages->map(function ($item, $key) {
            return [
                'avatar' => $item->user->avatar,
                'name' => $item->user->name,
                'content' => $item->content,
                'time' => $item->created_at->format("Y-m-d H:i:s")
            ];
        });
        Gateway::sendToUid(Auth::id(), json_encode($data));
    }
}
