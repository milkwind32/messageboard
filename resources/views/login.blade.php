@extends('layouts.user')

@section('content')

    <title>登入頁面</title>
</head>
<body>
    <h1>登入會員</h1>
    @if($errors->any())
		<div class="alert alert-secondary">
			<ul>
				@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
	@endif
    <form action="{{ url('login') }}" method="POST">
        <table>
            <tr>
                <td class=top>
                    帳號:
                    <input type="text" name="account">
                </td>   
            </tr> 
            <tr>
                 <td class=top>
                    密碼:
                    <input type="password" name="password">
                    @CSRF
                    <input type="submit" name="button" value="登入">
                </td>   
            </tr>     
        </table> 
    </form>
@stop        