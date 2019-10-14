

<div class='cart'>
    <div class='pb-5 m-4'>
        <div class='container-fluid'>
            <div class='justify-content-between'>
                <div class='col-12 pl-5 pr-5 pt-0 bg-white rounded shadow mb-5'>


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
                           <div class='py-2 text-uppercase'>prijs</div>
                        </th>
                        <th scope='col' class='border-0' style="background-color: #e0e0e0">
                            <div class='py-2 text-uppercase'>Verwijder</div>
                        </th>
                    </tr>
                    </thead>

<div class="container" style="margin-top: 100px">
<?php
if(!empty($allProduct)) {
    foreach ($allProduct as $product) {
        echo "
              <tbody>
                <tr>
                  <th scope='row' class='border-0'>
                    <div class='p-2'>
                      <img src=src/Resources/public/images/imageupload/" . $product['product_image'] . " width='70' class='img-fluid rounded shadow-sm'>
                    </div>
                  </th>
                  <td class='border-0 align-middle'><strong>" . $product['product_name'] . "</strong></td>
                  <td class='border-0 align-middle'>" . $product['product_description'] . "</td>
                  <td class='border-0 align-middle'><strong>€" . $product['product_price'] . "</strong></td>
                  <td class='border-0 align-middle'><a onclick=\"return confirm('Are you sure you want to delete this item?')\" href='admin?action=remove&id=" . $product['product_id'] . "' class='fa fa-trash' aria-hidden='true'></a></td>
                  </tr>              
        ";

    }

}

?>
                        </table>
                    </div>
                </div>
            </div>
        <div class="col-xl-11 col-sm-11 p-5 bg-white mb-5 mr-xl-3 mr-md-3 mr-sm-2 ml-sm-2 shadow-lg " style="height: fit-content; border-radius: 15px">
            <div class="text-white rounded-pill px-4 py-3 text-uppercase font-weight-bold" style="background-color: #4B515D">Product toevoegen </div>
            <div class="p-4">
                <form method="POST" enctype="multipart/form-data"  action="admin?action=add">
                    <ul>
                    <li class="d-flex justify-content-between py-3 border-bottom border-secondary"><strong class="text-muted">Foto product</strong></li>
                    <input type="file" name="image" class="mb-2">
                    <br>
                    <li class="d-flex justify-content-between py-3 border-bottom border-secondary"><strong class="text-muted">Product naam</strong></li>
                    <input type="text" name="name" class="mb-2" placeholder="Product naam">
                    <br>
                    <li class="d-flex justify-content-between py-3 border-bottom border-secondary"><strong class="text-muted">Product beschrijving</strong></li>
                    <textarea name="description" placeholder="Product beschrijving" class="mb-2" style="resize: none; width: 25%;  height: 200px"></textarea>
                    <br>
                    <li class="d-flex justify-content-between py-3 border-bottom border-secondary"><strong class="text-muted">Product voedingswarde</strong></li>
                    <textarea name="nutrition"  placeholder="Product voedingswaarde" class="mb-2" style="resize: none; width: 25%; height: 200px"></textarea>
                    <br>
                    <li class="d-flex justify-content-between py-3 border-bottom border-secondary"><strong class="text-muted">Product voedingswarde</strong></li>
                    <input type="text" name="price" placeholder="Prijs" class="mb-2" style="margin-bottom: 10px; width: 70px ">
                    <br>
                    <input type="number" name="amount" placeholder="Hoeveelheid" class="mb-2" style="margin-bottom: 10px; width: 70px">
                    <br>
                    <select name="juice_type" class="mb-2">
                        <option selected="selected">Kies de sap soort</option>
                        <option value="1">Vruchtensap</option>
                        <option value="2">Groentesap</option>
                    </select>
                    <br>
                    <select name="product_type" class="mb-2">
                        <option selected="selected">Kies het type product</option>
                        <option value="1">Particulier</option>
                        <option value="2">Zakelijk</option>
                    </select>
                    </ul>
                    <button type="submit" name="add" style="margin-bottom: 10px">Add product</button>

                </form>


            </div>
    </div>
</div>



