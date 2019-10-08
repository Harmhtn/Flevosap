<?php
foreach ($all_products as $product) {
//for select make a for loop or input field
    echo "
<div class='row'>
    <div class='col-md-1'></div>
    <div class='col-md-3'>
        <img src='src/Resources/public/images/imageupload/" . $product['product_image'] . "' class='card-img' alt='...'>
    </div>
    <div class='col-md-6'>
        <div class='card-body'>
            <form action='addToCart.php?id=" . $product['product_id'] . "' method='post'>
            <button type=\"submit\" class=\"btn btn-info float-right mb-2\">
            <i class=\"fas fa-cart-arrow-down\"></i>
            </button>
            <div class=\"form-group\">
                <label for=\"sel1\"></label>
                <select name='amount' class=\"form-control\" id=\"sel1\">
                    <option value='1'>1</option>
                    <option value='2'>2</option>
                    <option value='3'>3</option>
                    <option value='4'>4</option>
                    <option value='5'>5</option>
                </select>
            </div>
            </form>
            <h5 class='card-title'> " . $product['product_name'] . "</h5>
            <p class='card-text'>" . $product['product_description'] . "</p>
            <p class='card-text'><small class='text-muted'>" . $product['product_price'] . "</small></p>
        </div>
    </div>
    <div class='col-md-2'></div>
</div>
<hr>
";
}

?>