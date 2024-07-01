<?php
require_once("include/header.php");
$connect = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD, DB_NAME);
?>
    <div id="body">
        <?php include_once("include/left_content.php"); ?>
        <div class="rcontent">
            <h1><span>Dodaj novi proizvod</span></h1>
            <div id="data">Pregled svih proizvoda u skladistu <a style="text-decoration:none" href="viewlist.php?list=product">OVDJE</a><br /><br />

                <?php
                if(isset($_GET['success'])){
                    $result=mysqli_query($connect,"INSERT INTO product VALUES(NULL,{$_POST['supplier']},'{$_POST['product_name']}',{$_POST['quantity']},{$_POST['mprice']})");
                    if(!$result)echo "Dodavanje NIJE uspjelo!".mysqli_error($connect);
                    else echo"Dodavanje uspjesno";
                }
                else{
                    echo "<form method='post' action='addproduct.php?success=1'>
					  <table>
					    <tr><td style='padding:5px'>Naziv: </td><td><input name='product_name' type='text' /></td></tr>";

                    echo"</select>
						</td></tr>
						<tr><td style='padding:5px'>Dobavljac: </td>
						<td><select name='supplier'>";

                    $supplier_set = mysqli_query($connect,"select sid, sdealer from supplier");
                    while($row = mysqli_fetch_array($supplier_set))
                        echo "<option value='{$row['sid']}'>{$row['sdealer']}</option>";

                    echo"</select></td></tr>
						<tr><td style='padding:5px'>Kolicina: </td><td><input name='quantity' type='text' /></td></tr>
						<tr><td style='padding:5px'>Cijena: </td><td><input name='mprice' type='text' /></td></tr>
						<tr><td style='padding:5px' colspan='2'><input type='submit' value='Spremi' /></td></tr>
					  </table></form>";
                }
                ?>
            </div>
        </div>
    </div>

<?php
require_once("include/footer.php");
?>