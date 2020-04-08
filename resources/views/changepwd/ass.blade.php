<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
<form action="/change/sele" method="post">
    @csrf
    <table>
        <tr>
            <td>请输入旧密码:</td>
            <td>
                <input type="password" name="u_password">
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