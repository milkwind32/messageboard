<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Test Ajax</title>
</head>
<body>
    返回的內容:<p style="color: red" class="response-message"></p>
    <form method="post" action="{{route('test.ajax')}}">
        {!! csrf_field() !!}
        提交的內容：<input type="text" name="text">
        <span class="submit-btn">提交</span>
    </form>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script>
    
    $('.submit-btn').click(function () {
        let url = $(this).closest('form').attr('action');
        let formData = $(this).closest('form').serialize();
        $.post(url,formData,function (response) {
            let responseData = response.data;
            let appendStr = '<span style="border: 1px solid blue">'+responseData.text+ response.msg +'</span>';
            $('.response-message').empty().append(appendStr);      
        })
    })
</script>
</html>