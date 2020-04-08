<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
<form action="{{url('user/findpwd1')}}" method="post">
    <table border="1">
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <tr>
            <td>账户:</td>
            <td><input type="text" name="u_name" placeholder="输入要找回的账户"></td>
        </tr>
        <tr>
            <td>邮箱:</td>
            <td><input type="text" name="u_email" placeholder="输入找回账户的邮箱"></td>
        </tr>
        <tr>
            <td colspan="2"><input type="submit" value="确认找回"></td>
        </tr>
    </table>
</form>
</body>
</html>
