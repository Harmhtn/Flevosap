<table class="table">
    <tr>
        <th>Product ID</th>
        <th>Naam</th>
        <th>Aantal</th>
        <th>Prijs</th>
    </tr>

    <?php
    echo "<pre>";
    print_r($_SESSION['cart_item']);
    exit;

    $i = 0;
    foreach ($_SESSION['cart_item'] as $result) {
        echo sprintf('<tr><td>%s</td><td>%s</td><td>%s</td></tr>', $result['id'], $result['name'], $result['quantity'], $result['price']);
    }
    ?>

</table>