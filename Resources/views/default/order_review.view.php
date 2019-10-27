<div class="container">
    <h1>Order Overzicht</h1>
    <table class="table table-hover">
        <tr>
            <th>Product ID</th>
            <th>Naam</th>
            <th>Aantal</th>
            <th>Prijs</th>
        </tr>

        <?php

        foreach ($_SESSION['cart_item'] as $result) {
            ?>
            <tr>
                <td><?= $result['id'] ?></td>
                <td><?= $result['name'] ?></td>
                <td><?= $result['quantity'] ?></td>
                <td><?= $result['price'] ?></td>
            </tr>
            <?php
        }
        ?>
    </table>
</div>
<div class="container">
    <p style="font-weight: bold">Totaal prijs exclusief btw: <?php echo $totalPriceExBtw ?> euro</p>
    <p style="font-weight: bold">Totaal prijs inclusief btw: <?php echo $totalPriceInBtw ?> euro</p>
    <p style="font-weight: bold">Verzendkosten: <?php echo $shippingCosts ?> euro</p>
</div>
<div class="container">
    <h2>De producten worden bezorgd naar
        <?php

        if (!empty($user_data)) {
            foreach ($user_data as $r) {
                echo $r['customer_address'];
            }
        }
        ?>
    </h2>
    <form action="orderreview" method="post">
        Wilt u naar een ander adres laten bezorgen?
        <input id="jabutton" type="button" class=" btn btn-primary" value="Verander" onclick="Show()"><br>
        <input style="display: none;" id="inputfield" class="form-control" name="newAddress"/><br>
        Betaalmethode
        <select class="custom-select shadow-sm mb-2 bg-white rounded" name="select_payment_method" required>
            <option value="ideal">Ideal</option>
            <option value="paypal">PayPal</option>
            <option value="mastercard">Mastercard</option>
            $
        </select>
        <button class="btn btn-primary" type="submit" href="#">Bestellen</button>
    </form>
</div>

<script>
    function Show() {
        var x = document.getElementById("inputfield");
        if (x.style.display === "none") {
            x.style.display = "block";
        } else {
            x.style.display = "none";
        }
    }
</script>