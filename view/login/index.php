<div class="container">
    <input type="checkbox" id="check">
    <div class="login form">
        <header>Login</header>
        <form method="post" action="#">
            <input name="username" type="text" placeholder="Username">
            <input name="password" type="password" placeholder="Password">
            <a href="#">Forgot password?</a>
            <input type="submit" class="button" name="login" value="Login">
        </form>
        <div class="signup">
        <span class="signup">Don't have an account?
         <label for="check">Signup</label>
        </span>
        </div>
    </div>
    <div class="registration form">
        <header>Signup</header>
        <form method="post" action="#">
            <input name="username" type="text" placeholder="Enter Username">
            <input name="pass" type="password" placeholder="Create a password">
            <input name="confirmPass" type="password" placeholder="Confirm your password">
            <input type="submit" class="button" value="SignUp" name="Signup">
        </form>
        <div class="signup">
        <span class="signup">Already have an account?
         <label for="check">Login</label>
        </span>
        </div>
    </div>
</div>
