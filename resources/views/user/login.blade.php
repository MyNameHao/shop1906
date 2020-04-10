<!DOCTYPE html>
<html lang="en">

<head>
    <title>用户登录</title>
    <!-- meta tags -->
    <meta charset="UTF-8" />

</head>


<body>
<div class=" w3l-login-form">
    <h2>Login Here</h2>
    <form action="{{url('/login/login_do')}}" method="post">
        <div class=" w3l-form-group">
            <div class="group">
                <i class="fas fa-user"></i>
                <input type="text" class="form-control" name="u_name" placeholder="Username  /Moblie  /Email" required="required" />
            </div>
        </div>
        <div class=" w3l-form-group">
            <div class="group">
                <i class="fas fa-unlock"></i>
                <input type="password" class="form-control" name="u_password" placeholder="Password" required="required" />
            </div>
        </div>
        <div class="forgot">
            <a href="#">Forgot Password?</a>
            <p><input type="checkbox">Remember Me</p>
        </div>
        <button type="submit">Login</button>
    </form>
    <p class=" w3l-register-p">Don't have an account?<a href="{{url('/register')}}" class="register"> Register</a></p>
    <p class=" w3l-register-p">Retrieve password！<a href="{{url('user/findpwd')}}" class="register"> FindPass</a></p>
    <p class=" w3l-register-p">Change Password！<a href="{{url('/change_pass')}}" class="register"> Change Password</a></p>
</div>
<footer>
    <p class="copyright-agileinfo"> &copy; Welcome to personal login</p>
</footer>

</body>

</html>