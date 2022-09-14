<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>留言板首頁</title>
    <style>
        h1{text-align:center; color:#ffffff;}  
        .iframe{background-color:#000090;color:#ffffff;font-size:2em;}
        .comment{color:rgb(244, 209, 11);font-size:1.3em;}
        .show_comment{background-color:#000090;color:#ffffff;font-size:2em;}
        .content{color:#ffffff;font-size:1.5em;height: 500px; width: 70%;}
        body{background-color:#000000;}
        .author{color:rgb(244, 209, 11); width:120px; display:inline-block;}
        .com{color:rgb(244, 209, 11); width:800px; display:inline-block;}
        .time{color:#067735; width:200px; display:inline-block;}
        a{color:#ffffff; background-color:#005000; font-size:1.3em;}
    </style>   
</head>
<body> 
    <h1>留言板</h1>
      
    <div class="iframe">
        <table>
            <tr>
                <td>
                    <iframe class="iframe" width="300" height="200" src="https://www.youtube.com/embed/dMTy6C4UiQ4" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </td>
                <td>
                    主題:【{{$article->title_type_name}}】{{$article->topic}} <br>
                    作者: {{$article->user_account}}【{{$article->nickname}}】<br>
                    發文時間: {{$article->articles_created_at}}<br>
                    @if($article->articles_created_at != $article->articles_updated_at)
                    修改時間: {{$article->articles_updated_at}}
                    @endif
                </td>    
            </tr>
         </table>
    </div>
    <a  class="btn btn-secondary" href="{{ url('/')}}">返回首頁</a><br>
    
    <div class="content">  
        {{$article->content}}
    </div>

    @if ($errors->any())
		<div class="alert alert-secondary">
			<ul>
				@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
	@endif

    <div id="btn-comment" class="show_comment">
        <p id ="count"> 顯示【{{count($comments)}}】則評論 </p>
    </div>

    <div id="comment" style="display:none" class="comment">     
        <form method="POST" action="{{url('/comment')}}">
            @CSRF
            <input type="hidden" name="id" value="{{$article->articles_id}}">            
            <textarea name="comment" rows="5" cols="40" placeholder="留下評論"></textarea>
            <button class="btn btn-secondary" type="submit">送出</button><br>
        </form>
        ===================================================================================================<br>               
        @foreach($comments as $comment)
            <span class="author">{{$comment->users_account}}:</span>
            <span class="com">{{$comment->comment}}</span>
            <span class="time">{{$comment->created_at}}</span><br> 
        @endforeach
    </div>

</body>
<script src="{{ asset('js/comment.js') }}" defer></script>      
<script>  
    let msg = "{{Session::get('alert')}}";
    let exist = "{{Session::has('alert')}}";
    if(exist){
      alert(msg);
    }
</script>

</html>
