

<div class='cart'>
    <div class='pb-5 m-4'>
        <div class='container-fluid'>
            <div class='justify-content-between'>
                <div class='col-12 pl-5 pr-5 pt-0 bg-white rounded shadow mb-5'>


                <table class='table'>
                    <thead class="rounded-pill px-4">
                    <tr>
                        <th scope='col' class='border-0 bg-light'>
                            <div class='p-2 px-3 text-uppercase'>Foto</div>
                        </th>
                        <th scope='col' class='border-0 bg-light'>
                            <div class='py-2 text-uppercase'>Naam</div>
                        </th>
                        <th scope='col' class='border-0 bg-light'>
                            <div class='py-2 text-uppercase'>beschrijving</div>
                        </th>
                        <th scope='col' class='border-0 bg-light'>
                           <div class='py-2 text-uppercase'>prijs</div>
                        </th>
                        <th scope='col' class='border-0 bg-light'>
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
                      <img src=../../Resources/Images/imageupload/" . $product['product_image'] . " width='70' class='img-fluid rounded shadow-sm'>
                    </div>
                  </th>
                  <td class='border-0 align-middle'><strong>" . $product['product_name'] . "</strong></td>
                  <td class='border-0 align-middle'>" . $product['product_description'] . "</td>
                  <td class='border-0 align-middle'><strong>€" . $product['product_price'] . "</strong></td>
                  <td class='border-0 align-middle'><a onclick=\"return confirm('Are you sure you want to delete this item?')\" href='admin.php?action=remove&id=" . $product['product_id'] . "' class='fa fa-trash' aria-hidden='true'></a></td>
                  </tr>              
        ";

    }

}

?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<form method="POST" action="admin.php?action=add" enctype="multipart/form-data">
    <input type="file"  name="image" style="margin-bottom: 10px">
    <br>
    <input type="text" name="name" placeholder="Product naam" style="margin-bottom: 10px">
    <br>
    <textarea name="description" placeholder="Product beschrijving" style="resize: none; width: 25%;  height: 200px"></textarea>
    <br>
    <textarea name="nutrition"  placeholder="Product voedingswaarde" style="resize: none; width: 25%; height: 200px"></textarea>
    <br>
    <input type="text" name="price" placeholder="Prijs" style="margin-bottom: 10px">
    <br>
    <select name="juice_type">
        <option selected="selected">Kies de sap soort</option>
        <option value="1">Vruchtensap</option>
        <option value="2">Groentesap</option>
    </select>

    <button type="submit" name="add" style="margin-bottom: 10px">Add product</button>
</form>

