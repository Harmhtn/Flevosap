<!-- styling for admin product -->
<div class='cart'>
    <div class='pb-5 m-4'>
        <div class='container-fluid'>
            <div class='justify-content-between'>
                <div class='pl-5 pr-5 pt-0 bg-white rounded shadow mb-5'>

                    <!-- table for viewing products -->
                <table class='table'>
                    <thead class="rounded-pill px-4">
                    <tr>
                        <th scope='col' class='border-0' style='background-color: #e0e0e0'>
                            <div class='p-2 px-3 text-uppercase'>Foto</div>
                        </th>
                        <th scope='col' class='border-0' style="background-color: #e0e0e0">
                            <div class='py-2 text-uppercase'>Naam</div>
                        </th>
                        <th scope='col' class='border-0' style="background-color: #e0e0e0">
                            <div class='py-2 text-uppercase'>beschrijving</div>
                        </th>
                        <th scope='col' class='border-0' style="background-color: #e0e0e0">
                            <div class='py-2 text-uppercase'>voedingswaarde</div>
                        </th>
                        <th scope='col' class='border-0' style="background-color: #e0e0e0">
                           <div class='py-2 text-uppercase'>prijs</div>
                        </th>
                        <th scope='col' class='border-0' style="background-color: #e0e0e0">
                            <div class='py-2 text-uppercase'>Hoeveelheid</div>
                        </th>
                        <th scope='col' class='border-0' style="background-color: #e0e0e0">
                            <div class='py-2 text-uppercase'>Verwijder</div>
                        </th>
                    </tr>
                    </thead>

<div class="container" style="margin-top: 100px">
<?php
//show all products in database
if(!empty($allProduct)) {
    foreach ($allProduct as $product) {

        echo "
              <tbody>
                <tr>
                  <th scope='row' class='border-0'>
                    <div class='p-2'>
                      <img src='/src/Resources/public/images/imageupload/" . $product['product_image'] . "' class='card-img' alt='... '>
                    </div>
                  </th>
                  <td class='border-0 align-middle' style='size: auto'><strong>" . $product['product_name'] . "</strong></td>
                  <td class='border-0 align-middle'>" . $product['product_description'] . "</td>
                  <td class='border-0 align-middle'>" . $product['nutrition_value'] . "</td>
                  <td class='border-0 align-middle'><strong>€" . $product['product_price'] . "</strong></td>
                  <td class='border-0 align-middle '><strong class='ml-3'>" . $product['storage_amount'] . "</strong></td>
                  <!-- button to delete item from database with a confirm -->
                  <td class='border-0 align-middle'><a onclick=\"return confirm('Are you sure you want to delete this item?')\" href='?url=product&action=remove&id=" . $product['product_id'] . "' class='fa fa-trash' aria-hidden='true'></a></td>
                  </tr>              
        ";

    }

}


?>
                        </table>
                    </div>
                </div>
            </div>
        <div class="p-5 bg-white mb-5 mr-xl-3 mr-md-3 mr-sm-2 ml-sm-2 shadow-lg " style="height: fit-content; border-radius: 15px">
            <div class="text-white rounded-pill px-4 py-3 text-uppercase font-weight-bold" style="background-color: #4B515D">Product toevoegen </div>
            <div class="p-4">
                <?php
                //check for errors
                if (!empty($error)) {
                    if ($error) {
                        echo '<div class="alert alert-danger">'. $error .'</div>';
                    }
                }

                if (!empty($_SESSION['errorcreate'])) {

                        echo '<div class="alert alert-danger">'.$_SESSION["errorcreate"].'</div>';

                }
                ?>
                <!-- form for adding products -->
                <form method="POST" enctype="multipart/form-data"  action="?url=product&action=add"  class="form-group">
                    <ul class="">
                    <li class="d-flex justify-content-between py-3 border-bottom border-secondary"><strong class="text-muted">Foto product</strong></li>
                        <input type="file" name="image" class="mb-2 mt-3">
                    <br>
                    <li class="d-flex justify-content-between py-3 border-bottom border-secondary"><strong class="text-muted">Product naam</strong></li>
                    <input type="text" name="name" class="mb-2 mt-3 form-control" placeholder="Product naam">
                    <br>
                    <li class="d-flex justify-content-between py-3 border-bottom border-secondary"><strong class="text-muted">Product beschrijving & voedingswaarde</strong></li>
                    <textarea name="description" placeholder="Product beschrijving" class="mb-1 mt-3 form-control" style="resize: none; height: 200px"></textarea>
                    <br>
                    <textarea name="nutrition"  placeholder="Product voedingswaarde" class="mb-2 form-control" style="resize: none; height: 200px"></textarea>
                    <br>
                    <li class="d-flex justify-content-between py-3 border-bottom border-secondary"><strong class="text-muted">Product prijs & hoeveelheid</strong></li>
                    <input type="text" name="price" placeholder="Prijs" class=" mt-3 form-control" >
                    <br>
                    <input type="number" name="amount" placeholder="Hoeveelheid" class="mb-2 form-control" >
                    <br>
                    <li class="d-flex justify-content-between py-3 border-bottom border-secondary"><strong class="text-muted">Product prijs & hoeveelheid</strong></li>
                    <select name="juice_type" class="mt-3 form-control">
                        <option selected="selected">Kies de sap soort</option>
                        <option value="1">Vruchtensap</option>
                        <option value="2">Groentesap</option>
                    </select>
                    <br>
                    <select name="product_type" class="mb-2 form-control">
                        <option selected="selected">Kies het type product</option>
                        <option value="1">Particulier</option>
                        <option value="2">Zakelijk</option>
                    </select>
                    <br>
                    <button type="submit" name="add" class="mt-3 btn btn-primary rounded " style="margin-bottom: 10px">Add product</button>
                    </ul>
                </form>


            </div>
    </div>
</div>



