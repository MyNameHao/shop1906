<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
<form action="{{url('user/verfinds')}}" method="post">
    <table border="1">
        <input type="hidden" name="u_email" value="{{$email}}">
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <tr>
            <td>密码:</td>
            <td><input type="password" name="u_password"></td>
        </tr>
        <tr>
            <td>确认密码:</td>
            <td><input type="password" name="u_passwords"></td>
        </tr>
        <tr>
            <td colspan="2"><input type="submit" value="确认修改"></td>
        </tr>
    </table>
</form>
</body>
</html>