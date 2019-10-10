<link rel="stylesheet" href="src/Resources/public/css/registerstyle.css">

<div class="wrapper fadeInDown">
        <div class="container">
            <div class="fadeIn first">
                <img src="src/Resources/public/images/logo-flevosap.png" id="icon" alt="Flevosap Logo"/>
            </div>
        <form method="post" action="register">
        <!--    customer name-->
            <div class="form-group">
                <label for="Input">Naam</label><br>
                <input type="text" class="form-control" name="customer_name" placeholder="Gebruikersnaam">
            </div>
        <!--    customer email-->
            <div class="form-group">
                <label for="Input">Email</label><br>
                <input type="email" class="form-control" name="customer_email" placeholder="Email">
            </div>
        <!--    customer password-->
            <div class="form-group">
                <label for="InputPassword">Wachtwoord</label><br>
                <input type="password" class="form-control" name="customer_password" id="InputPassword" placeholder="Wachtwoord">
            </div>
        <!--    customer zipcode-->
            <div class="form-group">
                <label for="Input">Postcode</label><br>
                <input type="text" class="form-control" name="customer_zipcode" placeholder="Postcode">
            </div>
        <!--    customer address-->
            <div class="form-group">
                <label for="Input">Adres</label><br>
                <input type="text" class="form-control" name="customer_address" placeholder="Adres">
            </div>
        <!--    customer city-->
            <div class="form-group form-check">
               <label>Stad</label><br>
                <select class="custom-select" name="select_city">
                    <option selected="selected">Kies een stad</option>
                    <?php
                    foreach ($cities as $city)
                    {
                        echo "<option value='". $city['city_id']. "'>". $city['city_name']. "</option>";
                    }
                    ?>
                </select>
            </div>
        <!--    customer phone-->
            <div class="form-group">
                <label for="Input">Telefoonnummer</label><br>
                <input type="text" class="form-control" name="customer_phone" pattern="06+[0-9]{8}" required>
            </div>
        <!--    customer particulier/zakelijk-->
            <div class="input-group">
                <label for="particulier">Particuliere registratie</label><br>
                <input type="radio" class="form-control" name="MyRadio" value="1" checked>
            </div>
            <div class="input-group">
                <label for="zakelijk">Zakelijke registratie</label><br>
                <input type="radio" class="form-control" name="MyRadio" value="2" checked>
            </div>
            <button type="submit" class="btn btn-primary">Registreer</button>
        </form>

        <div id="formFooter">
            <a class="underlineHover" href="login">Al een account?</a><br>
        </div>
    </div>
</div>