<div class="content" style="padding: 15%;">
    <form name="registration" onsubmit="return formValidation();" action="/customer/register" method="POST">
        <label for="username">Username</label>
        <input text type="text" name="username" size="12" />
        <label for="password">Password:</label>
        <input type="password" name="password" size="12" />
        <label for="name">Name:</label>
        <input type="text" name="name" size="50" />
        <label for="address">Address:</label>
        <input type="text" name="address" size="50" />
        <label for="phone">Phone:</label>
        <input type="text" name="phone" size="50" />
        <br />
        <br />
        <input type="submit" name="submit" value="Submit" />
        <input type="reset" value="Reset">
    </form>

    <? if (isset($err)) {
        echo $err;
    }
    ?>
</div>