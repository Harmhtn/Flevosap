<div class="container">
<form method="post" action="register">
<!--    customer name-->
    <div class="form-group">
        <label for="Input">Naam</label>
        <input type="text" class="form-control" name="customer_name" placeholder="Gebruikersnaam">
    </div>
<!--    customer email-->
    <div class="form-group">
        <label for="Input">Email</label>
        <input type="email" class="form-control" name="customer_email" placeholder="Email">
    </div>
<!--    customer password-->
    <div class="form-group">
        <label for="InputPassword">Wachtwoord</label>
        <input type="password" class="form-control" name="customer_password" id="InputPassword" placeholder="Wachtwoord">
    </div>
<!--    customer zipcode-->
    <div class="form-group">
        <label for="Input">Postcode</label>
        <input type="text" class="form-control" name="customer_zipcode" placeholder="Postcode">
    </div>
<!--    customer address-->
    <div class="form-group">
        <label for="Input">Adres</label>
        <input type="text" class="form-control" name="customer_" placeholder="Adres">
    </div>
<!--    customer city-->
    <div class="form-group form-check">
       <label>Stad</label>
        <select name="select_city">
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
        <label for="Input">Telefoonnummer</label>
        <input type="text" class="form-control" name="customer_phone" pattern="06+[0-9]{8}" required>
    </div>
<!--    customer particulier/zakelijk-->
    <div class="input-group">
        <input type="radio" name="MyRadio" value="1" checked>
        <label for="particulier">Particuliere registratie</label>
    </div>
    <div class="input-group">
        <input type="radio" name="MyRadio" value="2" checked>
        <label for="zakelijk">Zakelijke registratie</label>
    </div>
    <button type="submit" class="btn btn-primary">Registreer</button>
</form>

<div id="formFooter">
    <a class="underlineHover" href="login">Al een account?</a><br>
</div>
</div>