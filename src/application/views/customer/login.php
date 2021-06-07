<div style="padding: 15%;">
    <form action="/customer/login" method="post">
        <h1>Login form</h1>
        <br>
        <p class="highlight">Please enter your username and password to continue</p>
        <br>Username: <input text type="text" size="50" maxlength="50" minlength="3" name="username">
        <br>Password: <input text type="password" size="30" maxlength="30" minlength="3" name="password">
        <br />
        <br />
        <input type="submit" value="Login">
        <input type="reset" value="Reset">
        <br />
        <br />
        <a href="/customer/register">Don't have an account? Click here to join with us!</a>
        <? if (isset($err)) echo $err; ?>
    </form>
</div>