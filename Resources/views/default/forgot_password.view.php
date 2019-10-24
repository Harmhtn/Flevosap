<link rel="stylesheet" href="src/Resources/public/css/registerstyle.css">

<div class="container shadow-sm p-3 mb-2 bg-white rounded">
    <div class="container ">
        <div class="jumbotron shadow-sm p-3 mb-2 rounded">
            <img src="src/Resources/public/images/logo-flevosap.png" class="img-responsive" id="icon" alt="Flevosap Logo"/>
            <h1>Wachtwoord vergeten</h1>
        </div>
    </div>
<div class="container">
    <?php if (!empty($error)) {
    echo $error;
} ?>
            <form action="/forgot_password" method="post">
                <label>Voer hier je email adres in: </label>
                    <input class="form-control" name="email" type="text">
                <input type="hidden" name="email_send">
                <br>
                <input class="btn btn-primary" type="submit" value="Bevestig">
            </form>
    <div align="center">
            <a href="login">Terug naar login pagina</a>
    </div>
        </div>