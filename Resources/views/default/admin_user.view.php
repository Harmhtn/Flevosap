<div class='cart'>
    <div class='pb-5 m-4'>
        <div class='container-fluid'>
            <div class='justify-content-between'>
                <div class='pl-5 pr-5 pt-0 bg-white rounded shadow mb-5'>


                <table class='table'>
                    <thead class="rounded-pill px-4">
                    <tr>
                        <th scope='col' class='border-0' style='background-color: #e0e0e0'>
                            <div class='p-2 px-3 text-uppercase'>Naam</div>
                        </th>
                        <th scope='col' class='border-0' style="background-color: #e0e0e0">
                            <div class='py-2 text-uppercase'>email</div>
                        </th>
                        <th scope='col' class='border-0' style="background-color: #e0e0e0">
                            <div class='py-2 text-uppercase'>Adres</div>
                        </th>
                        <th scope='col' class='border-0' style="background-color: #e0e0e0">
                            <div class='py-2 text-uppercase'>Postcode</div>
                        </th>
                        <th scope='col' class='border-0' style="background-color: #e0e0e0">
                           <div class='py-2 text-uppercase'>Telefoonnummer</div>
                        </th>
                        <th scope='col' class='border-0' style="background-color: #e0e0e0">
                            <div class='py-2 text-uppercase'>Soort Account</div>
                        </th>

                    </tr>
                    </thead>

<div class="container" style="margin-top: 100px">
<?php
if (!empty($error)){
    if ($error){
        echo '<div class="alert alert-danger">er is een fout opgetreden met het blokkkeren!</div>';
    }
}
if (!empty($blockCustomer)){
    if ($blockCustomer){
        echo '<div class="alert alert-danger">er is een fout opgetreden met het de-blokkkeren!</div>';
    }
}

if(!empty($allCustomers)) {
    foreach ($allCustomers as $customer) {

        if ($customer['customer_type_customer_type_id'] == 1){
            $type = 'Particulier';
            $button = 'Blokkeren';
        }
        elseif ($customer['customer_type_customer_type_id'] == 2){
            $type = 'Zakelijk';
            $button = 'Blokkeren';
        }
        elseif ($customer['customer_type_customer_type_id'] == 3){
            $type = 'Admin';
            $button = 'Blokkeren';
        }
        elseif ($customer['customer_type_customer_type_id'] == 4){
            $type = 'Geblokkeerd';
            $button = 'De-blokkeren';
        }

        echo "
              <tbody>
                <tr>
                  <td class='border-0 align-middle'><strong>" . $customer['customer_name'] . " </strong></td>
                  <td class='border-0 align-middle'><strong>" . $customer['customer_email'] . "</strong></td>
                  <td class='border-0 align-middle'>" . $customer['customer_address'] . "</td>
                  <td class='border-0 align-middle'>" . $customer['customer_zipcode'] . "</td>
                  <td class='border-0 align-middle'><strong>" . $customer['customer_phone'] . "</strong></td>
                  <td class='border-0 align-middle '><strong class='ml-3'>" . $type . "</strong></td>
                  <td class='border-0 align-middle'><a onclick=\"return confirm('Weet u zeker dat u dit wilt doen?')\" class='btn-info p-2 rounded' href='/admin/gebruiker?action=". $button ."&id=" . $customer['customer_id'] . "'>$button</a> </td>
                  </tr>  
              </tbody>            
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