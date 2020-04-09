<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
<form action="{{url('/change/update')}}" method="post">
    @csrf
    <table>
        <tr>
            <td>输入新密码:</td>
            <td>
                <input type="password" name="u_password" id="u_password">
            </td>
        </tr>
        <tr>
            <td>确认新密码:</td>
            <td>
                <input type="password" name="u_password1" id="u_password1">
            </td>
        </tr>
        <tr>
            <td></td>
            <td>
                <input type="submit" value="确认">
            </td>
        </tr>
    </table>
</form>
</body>
</html>

