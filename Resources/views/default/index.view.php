
<?php
foreach ($products as $product) {
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
            <form action='?action=add&id=". $product['product_id'] ."'  method='post'>
            <button type=\"submit\" onclick='added()' class=\"btn btn-info float-right mb-2\">
            <i class=\"fas fa-cart-arrow-down\"></i>
            </button>
            <div class=\"form-group\">
            <input type=\"number\" id=\"tentacles\" name=\"quantity\" min='1' max=\"" . $Max . "\"> <p>In vooraad: ". $Max ."</p>

            </div>
            </form>
            <h5 class='card-title'> " . $product['product_name'] . "</h5>
            <p class='card-text'>" . $product['product_description'] . "</p>
            <a data-toggle='collapse' role=\"button\" href=\"#". $product['product_id'] ."\"  >Voedingswaarde</a>
            <p class='card-text collapse' role=\"button\" id=\"". $product['product_id'] ."\" >" . $product['nutrition_value'] . "</p>
            <p class='card-text'><small class='text-muted'>" . $product['product_price'] . "</small></p>
        </div>
    </div>
    <div class='col-md-2'></div>

</div>
      

";
}

?>
<script>
    //make alert after reload.
    function added() {
        window.alert("Het product is toegevoegd aan de winkelmand");
    }
</script>


<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
