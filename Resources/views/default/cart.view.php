
    <div class='cart'>
    <div class='pb-5 ml-xl-5 ml-sm-2 ml-md-2'>
    <div class='container-fluid'>
      <div class='row row justify-content-between'>
        <div class='col-xl-8 col-md-8 col-sm-11 p-5 bg-white rounded shadow mb-5' style="height: fit-content; width: fit-content" >

          <!-- Shopping cart table -->
          <div class=''>
            <table class='table' >
              <thead>
                <tr>
                  <th scope='col' class='border-0 bg-light'>
                    <div class='p-2 px-3 text-uppercase' style="width: auto">Product</div>
                  </th>
                  <th scope='col' class='border-0 bg-light'>
                    <div class='py-2 text-uppercase'>Prijs</div>
                  </th>
                  <th scope='col' class='border-0 bg-light'>
                    <div class='py-2 text-uppercase'>Aantal</div>
                  </th>
                  <th scope='col' class='border-0 bg-light'>
                    <div class='py-2 text-uppercase'>Product Totaal</div>
                  </th>                  
                  <th scope='col' class='border-0 bg-light'>
                    <div class='py-2 text-uppercase'>Verwijder</div>
                  </th>
                </tr>
              </thead>
<?php
if(!empty($_SESSION['cart_item'])) {
    foreach ($_SESSION['cart_item'] as $product) {
        echo "
              <tbody>
                <tr>
                  <th scope='row' class='border-0'>
                    <div class='p-2'>
                      <img src=../../Resources/Images/imageupload/" . $product['image'] . " width='70' class='img-fluid rounded shadow-sm'>
                      <div class='ml-3 d-inline-block align-middle'>
                        <h5 class='mb-0'> <p class='text-dark d-inline-block align-middle'>" . $product['name'] . "</p></h5>
                      </div>
                    </div>
                  </th>
                  <td class='border-0 align-middle'><strong>€ " . $product['price'] . "</strong></td>
                  <td class='border-0 align-middle'><strong>" . $product['quantity'] . "</strong></td>
                  <td class='border-0 align-middle'><strong>€ " . number_format($product['quantity'] * $product['price'], 2) . "</strong></td>
                  <td class='border-0 align-middle'><a href='cart.php?id=" . $product['name'] . "&action=remove' class='fa fa-trash' aria-hidden='true'></a></td>
                  </tr>
              
    ";
    }
    echo " 
        <tr> 
            <td class='border-0'></td>
            <td class='border-0'></td>
            <td class='border-0 '></td>  
            <td class='border-0 '></td>
            <td class='border-0'><a href='cart.php?id=" . $product['name'] . "&action=empty' class='btn btn-info' role='button'>Leeg mand</a></td>                    
        </tr>
    </tbody>
    ";
}
else
{
    echo "
        <tbody>
            <tr>
                <th scope='row' class='border-0'>
                    <h3 ><p class='text-dark d-inline-block align-middle'>Nog geen producten in mand.</p></h3>
                </th>
            </tr> 
        </tbody>
    ";

}
?>
            </table>
          </div>
        </div>
                <div class="col-xl-3 col-sm-11 p-5 bg-white shadow mb-5 mr-xl-3 mr-md-3 mr-sm-2 ml-sm-2 " style="height: 500px; border-radius: 15px">
                    <div class="bg-light rounded-pill px-4 py-3 text-uppercase font-weight-bold">Bestelling </div>
                    <div class="p-4">
                        <ul class="list-unstyled mb-4">
                            <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Subtotaal</strong><strong>€ <?= number_format($_SESSION['total_price'], 2);?></strong></li>
                            <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Verzendkosten</strong><strong>€ 0.00</strong></li>
                            <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">BTW</strong><strong>€ <?= number_format($_SESSION['btw'], 2);?></strong></li>
                            <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Totaal</strong>
                                <h5 class="font-weight-bold">€ <?= number_format($_SESSION['total_price']+$_SESSION['btw'], 2);?></h5>
                            </li>
                        </ul><a href="#" class="btn btn-dark rounded-pill py-2 btn-block">Bestelling afronden</a>
                    </div>
                </div>
          </div>





      </div>
    </div>
    </div>
    </div>



