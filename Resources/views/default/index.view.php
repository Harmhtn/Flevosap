<?php


foreach ($all_products as $product) {
    //amount in cart aftrekken van in vooraad
    //check in session if amount is to much


//for select make a for loop or input field
    echo "
<div class='row'>
    <div class='col-md-1'></div>
    <div class='col-md-3'>
        <img src='src/Resources/public/images/imageupload/" . $product['product_image'] . "' class='card-img' alt='...'>
    </div>
    <div class='col-md-6'>
        <div class='card-body'>

            <form action='winkelmand?action=add&id=". $product['product_id'] ."' method='post'>
            <button type=\"submit\" class=\"btn btn-info float-right mb-2\">
            <i class=\"fas fa-cart-arrow-down\"></i>
            </button>
            <div class=\"form-group\">
            <input type=\"number\" id=\"tentacles\" name=\"quantity\" min='1' max=\"" . ."\"> <p>In vooraad: ". $product['storage_amount'] ."</p>

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
<hr>
";
}

?>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
