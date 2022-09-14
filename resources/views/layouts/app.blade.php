<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>留言板首頁</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>       
        h1{text-align:center; color:#ffffff;}  
        .iframe{background-color:#000090;}
        .user{color:rgb(244, 209, 11); font-size:2em;}
        body{background-color:#000000; color:#ffffff}
        a{color:#ffffff; font-size:2em;}
        .author{color:#ffffff; width:150px; display:inline-block;}
        .mood{color:#ffffff; width:90px; font-size:1.3em; display:inline-block;}
        .date{color:#ffffff; width:70px; font-size:1.3em; display:inline-block;}
        .pagination .page-link {background: grey ;color: white;}
        .fix{width:50px; display:inline-block;}
    </style>   
</head>
<body> 
    <h1>留言板</h1>
      
    <div id="video" class="iframe">
        <iframe class="iframe" width="300" height="200" src="https://www.youtube.com/embed/dMTy6C4UiQ4" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    </div>

    @yield('content')
    
<script src="{{ asset('js/jquery-3.6.1.min.js') }}" defer></script> 
<script src="{{ asset('js/app.js') }}" defer></script> 
<script src="{{ asset('js/button.js') }}" defer></script> 
<script>
    
    function del() {
	    let msg = "確定要刪除嗎？";
	    if (confirm(msg)==true) {
		    return true;
	    } else {
		    return false;
	    }
    }
    
    let msg = "{{Session::get('alert')}}";
    let exist = "{{Session::has('alert')}}";
    if(exist) {
      alert(msg);
    }
</script>
</body>
</html>    