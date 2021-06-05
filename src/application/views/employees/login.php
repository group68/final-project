<div>
    <form action="/employees/login" method="post">
        <h1>Login form</h1>
        <br>
        <p class="highlight">Please enter your username and password to continue</p>
        <br>Username: <input text type="text" size="50" maxlength="50" name="username">
        <br>
        Password: <input text type="password" size="30" maxlength="30" name="password"><br>
        <br>
        <input type="submit" value="Login">
        <input type="reset" value="Reset">
        <br>
        <? if (isset($err)) echo $err; ?>
    </form>
</div>