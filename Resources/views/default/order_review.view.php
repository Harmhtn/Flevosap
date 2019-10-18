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
    $i = 0;
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
        <input class="form-control" type="text" name="newAddress"><br>
        Betaalmethode
        <select class="custom-select shadow-sm mb-2 bg-white rounded" name="select_payment_method" required>
            <option value="ideal">Ideal</option>
            <option value="paypal">PayPal</option>
            <option value="mastercard">Mastercard</option>$
        </select>
        <button class="btn btn-primary" type="submit" href="#">Bestellen</button>
    </form>
</div>