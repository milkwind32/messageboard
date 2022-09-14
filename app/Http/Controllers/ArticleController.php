<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use App\Services\Article;
use App\Services\Title_type;
use App\Services\Comment;

class ArticleController extends Controller
{
    /*
     * 文章與搜尋結果顯示頁面 
     * 依鍵入內容搜尋文章主題或文章內容      
     */
    public function index(Request $request) {
        $search = $request->input('search');
        $articles = Article::searchArticles($search);
        $model['articles'] = $articles;
        
        return view('index', $model);
    }
    /*
    *新增文章頁面
    *與修改文章相同頁面
    */
    public function create(Request $request) {

        return $this->edit($request, null);   
    }

    /*
     * 新增文章
     */
    public function store(Request $request) {
        
        $this->validate($request, [
            'topic' => 'required|max:50',
            'content' => 'required']);
                 
        $article = new Article();
        $article->user_account = Auth::user()->account;
        $article->topic = $request->input('topic');
        $article->content = $request->input('content');
        $article->title_type_id = $request->input('title');
        $article->save();
 
        return Redirect::to('/article')->with('alert', '新增成功!');   
    }

    /*
     * 顯示文章內容的頁面
     */
    public function show(Request $request, $id) {

        $article = Article::findAllData($id);
        $comments = Comment::findComments($id);
        
        if(isset($article)){ 
            $model['article'] = $article;
            $model['comments'] = $comments;

            return view('content', $model);
        } else {
            return Redirect::to('/article')->with('alert', '沒有文章!');  
        } 
    }

    /*
     * 顯示修改的頁面
     */
    public function edit($id) {
                 
        $article = Article::findALLData($id);
        $model['article'] = $article;
       
        $title_types =  Title_type::all();
        $model['title_types'] = $title_types;

        if(isset($article)) {
            $model['title'] = "修改";
            return view('edit', $model);
        } else {            
            $model['title'] = "新增";
            return view('edit', $model);
        }        
    }

    /*
     *修改文章 
     */
    public function update(Request $request, $id) {

        $user = Auth::user()->account;       
        $article = Article::find($id);

        if(isset($article) && $user == $article->user_account) {
            $article->title_type_id = $request->input('title');
            $article->topic = $request->input('topic');
            $article->content = $request->input('content');
            $article->save();
        
            return Redirect::to('/article')->with('alert', '修改成功!');
        } else {
            return Redirect::to('/article')->with('alert', '不是你的文章!');
        }
    }

    /*
     *刪除文章
     */
    public function destroy($id) {
        $user = Auth::user()->account;       
        $article = Article::find($id);

        if(isset($article) && $user == $article->user_account) {
            $article->delete();
         
            return Redirect::to('/article')->with('alert', '刪除成功');
        } else {
            return Redirect::to('/article')->with('alert', '不是你的文章!');
        }
    }
}
