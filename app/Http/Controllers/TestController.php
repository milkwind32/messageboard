<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index(){
        return view('test');
    }
    
    public function testAjax(Request $request) {
        $post = $request->except('_token');
        $result = $post;
        $response['status'] = 200;
        $response['msg'] = '請求大成功';
        $response['data'] = $result;
        return response($response);
    }
}
