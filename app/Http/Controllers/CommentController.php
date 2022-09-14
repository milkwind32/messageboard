<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\Comment;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
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

    /*
     *新增評論
     */
    public function store(Request $request) {
        
        $this->validate($request, [
            'comment' => 'required']);
                 
        $comment = new Comment();
        $id = $request->input('id');
        $comment->users_account = Auth::user()->account;
        $comment->articles_id = $id;
        $comment->comment = $request->input('comment');
        $comment->save();
 
        return Redirect::to('/article/'.$id)->with('alert', '新增成功!');   
    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
