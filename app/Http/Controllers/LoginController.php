<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LoginController extends Controller {
    
    /*
    *登入頁面
    */
    public function index() {   

        return view('login');
    }

    /*
    *登出
    */
    public function logout() {

        Auth::logout();
        return Redirect::to('/')->with('alert', '您已登出');      
    }
    
    /*
    *登入
    */
    public function login(Request $request) {

        $account = $request->input('account');
        $password =  $request->input('password');
        
        $this->validate($request, [
            'account' => 'required|max:30',
            'password' => 'required']);                

        if(Auth::attempt(['account' => $account, 'password' => $password])) {                    
            return Redirect::to('/')->with('alert', '登入成功');
        }

        return Redirect::to('/login')->with('alert', '登入失敗，請確定帳密是否正確');
    }

}
