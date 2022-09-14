<?php

namespace App\Http\Controllers;

use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\HASH;

class UserController extends Controller
{
    
    /*
     *註冊頁面 
     */
    public function index() {
        
        return view('register');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     *註冊使用者
     *驗證帳號不可重複,密碼雙重確認
     */
    public function store(Request $request) {
        
        $this->validate($request, [
            'account' => 'required|unique:users|max:30',
            'password' => 'required|confirmed|max:30']);

        $account = $request->input('account');
        $password = Hash::make($request->input('password'));
        $nickname = $request->input('name');
    

        $user = new User();
        $user->account = $account;
        $user->password = $password;
        $user->nickname = $nickname;
        $user->save();
                  
        $message = "註冊成功!";
        return Redirect::to('/')->with('alert', $message);
               
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * 修改使用者暱稱頁面
     */
    public function edit($id) {

        $loginUser = Auth::user()->account;  
        $user = User::find($id);
        
        if(isset($user) && $loginUser == $user->account) {
            $model['user'] = $user;
            return view('editUser', $model); 
        } else {
            return Redirect::to('/article')->with('alert', '非此使用者!');  
        }
    }

    /**
     * 修改使用者暱稱
     */
    public function update(Request $request, $id) {
        
        $loginUser = Auth::user()->account;       
        $user = User::find($id);

        if(isset($user) && $loginUser == $user->account) {
            $user->nickname = $request->input('nickname');
            $user->save();
        
            return Redirect::to('/article')->with('alert', '修改成功!');
        } else {
            return Redirect::to('/article')->with('alert', '非此使用者!');
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
    }
}
