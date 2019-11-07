<!-- view for register -->
<link rel="stylesheet" href="src/Resources/public/css/registerstyle.css">


<div class="container shadow-sm p-3 mb-2 bg-white rounded">
    <div class="container ">
        <div class="jumbotron shadow-sm p-3 mb-2 rounded">
            <img src="src/Resources/public/images/logo-flevosap.png" class="img-responsive" id="icon" alt="Flevosap Logo"/>
            <h1>Maak nu je Flevosap account aan</h1>
        </div>
    </div>
    <?php
    if (!empty($error)) {
        ?>
        <div class="alert alert-danger">Geen goede gegevens!</div>
        <?php
    }

    //check if the account is already existing
    if (!empty($already_exists)) {
        ?>
        <div class="alert alert-danger"> Dit account bestaat al</div>
        <?php
    }
    ?>
        <form method="post" action="?url=register">

        <!--    customer name-->
            <div class="form-group">
                <label for="Input">Naam</label><br>
                <input class="form-control shadow-sm p-3 mb-2 bg-white rounded" type="text" name="customer_name" placeholder="Gebruikersnaam" required>
            </div>
        <!--    customer email-->
            <div class="form-group">
                <label for="Input">Email</label><br>
                <input class="form-control shadow-sm p-3 mb-2 bg-white rounded" type="email" name="customer_email" placeholder="voorbeeld@voorbeeldmail.nl" required>
            </div>
        <!--    customer password-->
            <div class="form-group">
                <label for="InputPassword">Wachtwoord</label><br>
                <input class="form-control shadow-sm p-3 mb-2 bg-white rounded" type="password" name="customer_password" id="InputPassword" placeholder="Wachtwoord" required>
            </div>
        <!--    customer zipcode-->
            <div class="form-group">
                <label for="Input">Postcode</label><br>
                <input class="form-control shadow-sm p-3 mb-2 bg-white rounded" type="text" name="customer_zipcode" placeholder="1234AB" required>
            </div>
        <!--    customer address-->
            <div class="form-group">
                <label for="Input">Adres</label><br>
                <input class="form-control shadow-sm p-3 mb-2 bg-white rounded" type="text" name="customer_address" placeholder="Adres" required>
            </div>
        <!--    customer city-->
            <div class="form-group">
               <label>Stad</label><br>
                <select class="custom-select shadow-sm mb-2 bg-white rounded" name="select_city" required>
                    <?php
                    foreach ($cities as $city) {
                        echo "<option value='". $city['city_id']. "'>". $city['city_name']. "</option>";
                    }
                    ?>
                </select>
            </div>
        <!--    customer phone-->
            <div class="form-group">
                <label for="Input">Telefoonnummer</label><br>
                <input class="form-control shadow-sm p-3 mb-2 bg-white rounded" type="text" name="customer_phone" placeholder="0612345678" pattern="06+[0-9]{8}" required>
            </div>
        <!--    customer particulier/zakelijk-->
            <div class="form-check form-check-inline">
                <input class="form-check-input shadow-sm p-3 mb-2 bg-white rounded" type="radio" name="MyRadio" value="1" checked>
                <label class="form-check-label" for="particulier">Particuliere registratie</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input shadow-sm p-3 mb-2 bg-white rounded" type="radio" name="MyRadio" value="2">
                <label class="form-check-label" for="zakelijk">Zakelijke registratie</label>
            </div>
            <div class="container">
                <br><button class="btn-primary btn-lg btn-block " type="submit">Registreer</button>
            </div>
        </form>
    <div id="footer">
            <a class="underlineHover" href="login">Al een account?</a>
    </div>
    </div>
