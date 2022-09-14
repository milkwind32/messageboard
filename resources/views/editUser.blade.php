@extends('layouts.user')

@section('content')
	<title>修改會員</title>
</head>
<body>
	<h1>修改暱稱</h1>
    
    <div>  		
        <form method="POST" action="{{ url('register/'.($user->id)) }}">
            {{ method_field('PATCH') }}
	        @CSRF

            暱稱:<br>   
            <input name="nickname" type="text" value="{{ $user->nickname}}">            
            <button type="submit">送出</button>
        </form>       	
	</div>
@stop