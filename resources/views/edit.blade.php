@extends('layouts.user')

@section('content')

	<title>新增修改頁面</title>
</head>
<body>
	<h1>{{$title}}</h1>
	@if ($errors->any())
		<div class="alert alert-secondary">
			<ul>
				@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
	@endif
    <div>  		
        <form method="POST" action="{{ url('article/'.($article->articles_id  ?? '' )) }}" >
            @isset($article->articles_id)
                {{ method_field('PATCH') }}
            @endisset
	        @CSRF

            標題:
        	<select name="title">
                @foreach($title_types as $title_type)
						@if(isset($article) && $article->title_type_id == $title_type->id) {       		
		                	<option selected value="{{$title_type->id}}">{{$title_type->title_type_name}}</option>				
						@else 										
                            <option value="{{$title_type->id}}">{{$title_type->title_type_name}}</option>      			
						@endif              	
        		@endforeach 
        	</select><br>   
           
            主題:<br>   
            <input name="topic" type="text" value="{{ $article->topic ?? '' }}"><br>

            留言內容:<br> 
            <textarea name="content" id="content" rows="20" cols="80">{{ $article->content ?? '' }}</textarea>
            <button class="btn btn-secondary" type="submit">{{$title}}</button><br> 

        </form>          
	</div>
    
@stop
