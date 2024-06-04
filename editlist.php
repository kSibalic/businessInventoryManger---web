<?php
require_once("include/header.php");
$connect = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD, DB_NAME);
?>
<div id="body">
    <?php include_once("include/left_content.php"); ?>
    <div class="rcontent">
        <?php
        //product start
        if(!strcmp(strtolower($_GET['name']),"product") && isset($_GET['success'])){
            // Ensure the product_type is set and not empty
            $product_type = isset($_POST['product_type']) ? $_POST['product_type'] : 0;
            $result = mysqli_query($connect, "UPDATE product SET product_name='{$_POST['product_name']}', supplier_id={$_POST['supplier']}, quantity={$_POST['quantity']}, product_type='{$product_type}', market_price={$_POST['mprice']} WHERE product_id='{$_POST['product_id']}'");
            if(!$result){
                echo "Promjena NIJE uspjela! ".mysqli_error($connect);
            } else {
                echo "<h1><span>Promjena je uspjela!</span></h1>";
            }
        } else {
            if(isset($_GET['name']) && isset($_GET['id'])){
                //product
                if(!strcmp(strtolower($_GET['name']),"product")){
                    echo "<h1><span>Uredi ".ucfirst($_GET['name'])."</span></h1>";
                    echo "<div id='data'>";

                    $plist = mysqli_query($connect, "SELECT * FROM product WHERE product_id='{$_GET['id']}'");
                    $plist = mysqli_fetch_array($plist);
                    echo "<form method='post' action='editlist.php?name=product&success=1'>
                            <table>
                                <tr><td style='padding:5px'>Naziv: </td><td><input name='product_name' type='text' value='{$plist['product_name']}' /></td></tr>
                                <input type='hidden' name='product_id' value='{$plist['product_id']}' />
                                <tr><td style='padding:5px'>Kategorija: </td>
                                <td><select name='product_type'>";

                    // Populate the dropdown with options for product_type
                    $product_types = array(1 => 'Type1', 2 => 'Type2', 3 => 'Type3'); // Example types
                    foreach($product_types as $key => $value) {
                        if($key == $plist['product_type']) {
                            echo "<option value='{$key}' selected='selected'>{$value}</option>";
                        } else {
                            echo "<option value='{$key}'>{$value}</option>";
                        }
                    }

                    echo        "</select>
                                </td></tr>
                                <tr><td style='padding:5px'>Dobavljac: </td>
                                <td><select name='supplier'>";

                    $supplier_set = mysqli_query($connect, "SELECT sid, sdealer FROM supplier");
                    while($row = mysqli_fetch_array($supplier_set)){
                        if($row['sid'] == $plist['supplier_id']) {
                            echo "<option value='{$row['sid']}' selected='selected'>{$row['sdealer']}</option>";
                        } else {
                            echo "<option value='{$row['sid']}'>{$row['sdealer']}</option>";
                        }
                    }

                    echo        "</select></td></tr>
                                <tr><td style='padding:5px'>Kolicina: </td><td><input name='quantity' type='text' value='{$plist['quantity']}' /></td></tr>
                                <tr><td style='padding:5px'>Cijena: </td><td><input name='mprice' type='text' value='{$plist['market_price']}' /></td></tr>
                                <tr><td style='padding:5px' colspan='2'><input type='submit' value='Spremi' /></td></tr>
                            </table></form>";
                    echo "</div>";
                }
            }
        }//product end

        //supplier start
        if(!strcmp(strtolower($_GET['name']),"supplier") && isset($_GET['success'])){
            $result = mysqli_query($connect, "UPDATE supplier SET sname='{$_POST['name']}', saddress='{$_POST['address']}', sphone={$_POST['phone']}, semail='{$_POST['email']}' WHERE sid='{$_POST['sid']}'");
            if(!$result){
                echo "Promjena NIJE uspjela ".mysqli_error($connect);
            } else {
                echo "<h1><span>Promjena je uspjela!</span></h1>";
            }
        } else {
            if(isset($_GET['name']) && isset($_GET['id'])){
                //supplier
                if(!strcmp(strtolower($_GET['name']),"supplier")){
                    echo "<h1><span>Uredi ".ucfirst($_GET['name'])."</span></h1>";
                    echo "<div id='data'>";

                    $plist = mysqli_query($connect, "SELECT * FROM supplier WHERE sid='{$_GET['id']}'");
                    $plist = mysqli_fetch_array($plist);
                    echo "<form method='post' action='editlist.php?name=supplier&success=1'>
                            <table>
                                <tr><td style='padding:5px'>Naziv: </td><td><input name='name' type='text' value='{$plist['sname']}' /></td></tr>
                                <tr><td style='padding:5px'>Adresa: </td><td><input name='address' type='text' value='{$plist['saddress']}' /></td></tr>
                                <tr><td style='padding:5px'>Telefon: </td><td><input name='phone' placeholder='+385..' type='text' value='{$plist['sphone']}'/></td></tr>
                                <input type='hidden' value='{$_GET['id']}' name='sid' />
                                <tr><td style='padding:5px'>Email: </td><td><input name='email' placeholder='ime@email.com' type='text' value='{$plist['semail']}'/></td></tr>
                                <tr><td style='padding:5px' colspan='2'><input type='submit' value='Spremi' /></td></tr>
                            </table></form>";
                    echo "</div>";
                }
            }
        }//supplier end

        // Employee start
        if(!strcmp(strtolower($_GET['name']), "employee") && isset($_GET['success'])){
            $result = mysqli_query($connect, "UPDATE employee SET 
                                                fname='{$_POST['fname']}', 
                                                lname='{$_POST['lname']}', 
                                                salary={$_POST['salary']}, 
                                                pnum='{$_POST['pnum']}', 
                                                address='{$_POST['address']}', 
                                                uid='{$_POST['uid']}', 
                                                jdate='{$_POST['jdate']}', 
                                                bdate='{$_POST['bdate']}', 
                                                perks={$_POST['perks']}, 
                                                admin={$_POST['admin']} 
                                              WHERE id='{$_POST['id']}'");
            if(!$result){
                echo "Promjena NIJE uspjela! ".mysqli_error($connect);
            } else {
                echo "<h1><span>Promjena je uspjela!</span></h1>";
            }
        } else {
            if(isset($_GET['name']) && isset($_GET['id'])){
                if(!strcmp(strtolower($_GET['name']), "employee")){
                    echo "<h1><span>Uredi ".ucfirst($_GET['name'])."</span></h1>";
                    echo "<div id='data'>";

                    $elist = mysqli_query($connect, "SELECT * FROM employee WHERE id='{$_GET['id']}'");
                    $elist = mysqli_fetch_array($elist);
                    echo "<form method='post' action='editlist.php?name=employee&success=1'>
                            <table>
                                <tr><td style='padding:5px'>Ime: </td><td><input name='fname' type='text' value='{$elist['fname']}' /></td></tr>
                                <tr><td style='padding:5px'>Prezime: </td><td><input name='lname' type='text' value='{$elist['lname']}' /></td></tr>
                                <tr><td style='padding:5px'>Placa: </td><td><input name='salary' type='text' value='{$elist['salary']}' /></td></tr>
                                <tr><td style='padding:5px'>Broj telefona: </td><td><input name='pnum' type='text' value='{$elist['pnum']}' /></td></tr>
                                <tr><td style='padding:5px'>Adresa: </td><td><input name='address' type='text' value='{$elist['address']}' /></td></tr>
                                <tr><td style='padding:5px'>OIB: </td><td><input name='uid' type='text' value='{$elist['uid']}' /></td></tr>
                                <tr><td style='padding:5px'>Datum rođenja: </td><td><input name='bdate' type='text' value='{$elist['bdate']}' /></td></tr>
                                <tr><td style='padding:5px'>Datum zaposlenja: </td><td><input name='jdate' type='text' value='{$elist['jdate']}' /></td></tr>
                                <tr><td style='padding:5px'>Dodaci: </td><td><input name='perks' type='text' value='{$elist['perks']}' /></td></tr>
                                <tr><td style='padding:5px'>Je li admin? </td><td>
                                    <select name='admin'>
                                        <option value='1' ".($elist['admin'] == 1 ? 'selected' : '').">Je</option>
                                        <option value='0' ".($elist['admin'] == 0 ? 'selected' : '').">Nije</option>
                                    </select>
                                </td></tr>
                                <input type='hidden' name='id' value='{$elist['id']}' />
                                <tr><td style='padding:5px' colspan='2'><input type='submit' value='Spremi' /></td></tr>
                            </table>
                          </form>";
                    echo "</div>";
                }
            }
        }// Employee end

        ?>

    </div>
</div>

<?php
require_once("include/footer.php");
?>
