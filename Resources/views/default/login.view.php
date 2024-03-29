<!-- view for login -->
<link rel="stylesheet" href="src/Resources/public/css/loginstyle.css">

<div class="wrapper fadeInDown">
    <div id="formContent">
        <!-- Tabs Titles -->

        <!-- Icon -->
        <div class="fadeIn first">
            <img src="src/Resources/public/images/logo-flevosap.png" id="icon" alt="Flevosap Logo"/>
        </div>


        <!-- Login Form -->
        <form method="post" action="login">
            <?php
            //check for errors
            if (!empty($error)) {
                ?>
                <div class="alert alert-danger"><?= $error ?></div>
                <?php
            }
            ?>
            <input type="email" id="login" class="fadeIn second form-control" name="email" placeholder="Login met email adres"><br>
            <input type="password" id="password" class="fadeIn third form-control" name="password" placeholder="Wachtwoord"><br>
            <input type="submit" class="fadeIn fourth" value="Log In">
        </form>

        <!-- Remind Passowrd -->
        <div id="formFooter">
            <a class="underlineHover" href="forgot_password">Wachtwoord vergeten?</a><br>
            <a class="underlineHover" href="register">Nog geen account?</a>
        </div>

    </div>
</div>