<div class="container">
    <div class="row justify-content-end">
    <div class="dropdown " >
        <form action="" method="post">
            <button type="submit" class="btn btn-secondary dropdown-toggle"
                    id="dropdownMenuButton" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                Sorteer producten
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" href="/business?sort=alphabetical">Alfabetische volgorde</a>
                <a class="dropdown-item" href="/business?sort=price-high">Prijs hoog</a>
                <a class="dropdown-item" href="/business?sort=price-low">Prijs laag</a>
            </div>
        </form>
    </div>
    </div>

    <?php
        foreach ($all_products_business as $product) {

    //for select make a for loop or input field
            if (isset($_SESSION['cart_item'][$product['product_name']]['quantity'])) {
                $amountCart = $_SESSION['cart_item'][$product['product_name']]['quantity'];
            } else {
                $amountCart = 0;
            }
            $amountAvailible = $product['storage_amount'];
            $Max = $amountAvailible - $amountCart;



            echo "
    <div class='row'>
        <div class='col-md-1'></div>
        <div class='col-md-3'>
            <img src='src/Resources/public/images/imageupload/" . $product['product_image'] . "' class='card-img' alt='...'>
        </div>
        <div class='col-md-6'>
            <div class='card-body'>
                <form action='?action=add&id=" . $product['product_id'] . "'  method='post'>
                <button type=\"submit\" onclick='added()' class=\"btn btn-info float-right mb-2\">
                <i class=\"fas fa-cart-arrow-down\"></i>
                </button>
                <div class=\"form-group\">
                <input type=\"number\" id=\"tentacles\" name=\"quantity\" min='1' max=\"" . $Max . "\"> <p>In vooraad: " . $Max . "</p>
    
                </div>
                </form>
                <h5 class='card-title'> " . $product['product_name'] . "</h5>
                <p class='card-text'>" . $product['product_description'] . "</p>
                <a data-toggle='collapse' role=\"button\" href=\"#" . $product['product_id'] . "\"  >Voedingswaarde</a>
                <p class='card-text collapse' role=\"button\" id=\"" . $product['product_id'] . "\" >" . $product['nutrition_value'] . "</p>
                <p class='card-text'><small class='text-muted'>" . $product['product_price'] . "</small></p>
            </div>
        </div>
    
    </div>
          
    
    ";

    }

    ?>
</div>
<script>
    //make alert after reload.
    function added() {
        window.alert("Het product is toegevoegd aan de winkelmand");
    }
</script>

