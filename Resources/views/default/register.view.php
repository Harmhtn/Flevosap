<div class="container m-4">
    <form method="post" action="../register.php">
        <div class="input-group">
            <label>Naam</label>
            <input type="text" name="customer_name" required autofocus>
        </div>
        <div class="input-group">
            <label>Email</label>
            <input type="email" name="customer_email" value="" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required>
        </div>
        <div class="input-group">
            <label>Wachtwoord</label>
            <input type="password" name="customer_password" value="" required>
        </div>
        <div class="input-group">
            <label>Postcode</label>
            <input type="text" name="customer_zipcode" value="" pattern="[0-9]{4}[a-zA-Z]{2}">
        </div>
        <div class="input-group">
            <label>Adres</label>
            <input type="text" name="customer_address" value="">
        </div>
        <div class="input-group">
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
        <div class="input-group">
            <label>Telefoon nummer</label>
            <input type="text" name="customer_phone" value="" pattern="06+[0-9]{8}"  required>
        </div>
        <div class="input-group">
            <input type="radio" name='MyRadio' value="1"  checked>
            <label for="particulier">Partiucliere registratie</label>
        </div>
        <div class="input-group">
            <input type="radio" name='MyRadio' value="2">
            <label for="zakelijk">Zakelijke registratie</label>
        </div>
        <div class="input-group">
            <button type="submit" class="btn" >Registreer</button>
        </div>
        <p>
            Al een gebruiker? <a href="../login.php">Log nu in</a>
        </p>
    </form>
</div>