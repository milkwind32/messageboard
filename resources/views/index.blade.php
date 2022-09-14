@extends('layouts.app')

@section('content')
    <div class="user">
        @if(Auth::check())
            Hello,
            {{ Auth::user()->account}}
            <a class="btn btn-secondary" href="{{ url('logout/') }}">登出</a>
            <a class="btn btn-secondary" href="{{ url('register/'.(Auth::user()->id).'/edit') }}">修改暱稱</a> 
            <a class="btn btn-secondary" href="{{ url('article/create') }}">新增文章</a>
            <button class="btn btn-secondary" id="btn">編輯</button>   
        @else   
            <a class="btn btn-secondary" href="{{ url('login/') }}">登入</a>
            <a class="btn btn-secondary" href="{{ url('register/') }}">註冊</a><br>  
        @endif     
    </div>
    <div>
        <form action="" method="GET">
            <input name="search" type="text" placeholder="搜尋主題或內容">
            <button type="submit" class="btn btn-secondary">搜尋</button>
            @isset($_GET['search'])   
                <a class="btn btn-secondary" href="{{ url('/') }}">返回</a><br>
            @endisset
        </form>
    </div>
    =========================================================================================================================<br>
    <table>
        @foreach($articles as $article)
        <tr id="edit"class="articles">  
            <td class="fix" style="visibility:hidden" >
                @if(Auth::check() && Auth::user()->account == $article->user_account)
             
                    <a class="btn btn-secondary btn-sm" href="{{url('article/'.($article->articles_id).'/edit')}}">修改</a>                    

                    <form  action="{{url('article/'.($article->articles_id))}}" method="POST">
                        @CSRF
                        {{method_field('DELETE')}}                  
                        <button class="btn btn-secondary btn-sm" type="submit" onclick="javascript:return del()">刪除</button>
                    </form>
                @endif
            </td>
            <td>                                               
                <span class="author">【{{$article->user_account}}】</span>
                <span class="date">{{substr($article->created_at, 5, 2)."/".substr($article->created_at, 8, 2)}}</span>
                <span class="mood">【{{$article->title_type_name}}】</span>                        
                <a href="{{ url('article/'.($article->articles_id))}}">{{$article->topic}}</a><br>
                ===================================================================================================================<br> 
            </td>                                       
        </tr>
        @endforeach
    </table>
            <form action="{{route('test.index')}}" method="get">
                 @CSRF
            <input name="age" type="text" placeholder="年齡">
            <button type="submit" class="btn btn-secondary">搜尋</button>
           
        </form>
    <div>   
        {{$articles->withQueryString()->links()}}    
    </div>
@stop 
             