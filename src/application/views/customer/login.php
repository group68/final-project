<div style="padding: 5%;">
    <form action="/customer/login" method="post">
        <h1>Login form</h1>
        <br>
        <p class="highlight">Please enter your username and password to continue</p>
        <br>Username: <input text type="text" size="50" maxlength="50" minlength="8" name="username">
        Password: <input text type="password" size="30" maxlength="30" minlength="3" name="password"><br>
        <br><input type="submit" value="Login">
        <input type="reset" value="Reset">
        <? if (isset($err)) echo $err; ?>
    </form>
</div>