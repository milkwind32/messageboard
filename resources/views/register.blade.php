@extends('layouts.user')

@section('content')

    <title>註冊頁面</title>
</head>
<body>
    <h1>註冊會員</h1>
    @if ($errors->any())
		<div class="alert alert-secondary">
			<ul>
				@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
	@endif
    <form action="{{ url('register/')}}" method="POST">
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
                    <input type="password" name="password" >
                </td>
            </tr>
            <tr>
                <td class=top>
                    確認密碼: 
                    <input type="password" name="password_confirmation">
                </td>
            </tr>
            <tr>
                <td class=top>
                    暱稱: 
                    <input type="text" name="name" value="{{ old('name') ?? '' }}">
                    @CSRF
                    <input type="submit" name="button" value="註冊">
                </td> 
            </tr>    
        </table> 
    </form>
@stop  