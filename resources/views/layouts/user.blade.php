<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        a{color:#ffffff; font-size:1.3em;}
        body{background-color:#000000; color:#ffffff}
        .top{color:rgb(244, 209, 11);}
    </style>
    @yield('content')
    <a class="btn btn-secondary" href="{{ url('/') }}">返回首頁</a>
</body>
<script>   
   let msg = "{{Session::get('alert')}}";
   let exist = "{{Session::has('alert')}}";
   if(exist){
     alert(msg);
   }
 </script>   
</html>        