<?php
require_once("include/header.php");
$connect = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD, DB_NAME);
?>
<div id="body">
    <?php include_once("include/left_content.php"); ?>
    <div class="rcontent">
        <?php if(isset($_GET['list'])){
            //product
            if(!strcmp(strtolower($_GET['list']),"product")){
                echo"<h1><span>Popis ".ucfirst($_GET['list'])."</span></h1>";
                echo"<div id='contentbox'><div id='data'>
                 <table id='itemList' ><tr><th>ID</th><th>Naziv</th><th>Dobavljač</th><th>Cijena</th><th>Opcije</th></tr>";
                $plist = mysqli_query($connect,"SELECT product.product_id, product.product_name, product.quantity, product.supplier_id, supplier.sdealer FROM product INNER JOIN supplier ON product.supplier_id = supplier.sid;");

                while($row = mysqli_fetch_array($plist)){
                    echo"<tr><td>{$row['product_id']}</td>
                     <td>{$row['product_name']}</td>
                     <td>{$row['sdealer']}</td>
                     <td>{$row['quantity']}</td>
                     <td><a href='editlist.php?name=product&id={$row['product_id']}'>Uredi</a></td>
                     </tr>";
                }
                echo"</table></div></div>";
            }//end product

            //supplier
            elseif(!strcmp(strtolower($_GET['list']),"supplier")){
                echo"<h1><span>Popis ".ucfirst($_GET['list'])."</span></h1>";
                echo"<div id='contentbox'><div id='data'>
                 <table id='itemList' ><tr><th>ID</th><th>Naziv</th><th>Email</th><th>Telefon</th><th>Opcije</th></tr>";
                $slist = mysqli_query($connect, "SELECT sid, sdealer, semail, sphone FROM supplier");
                while($row = mysqli_fetch_array($slist)){
                    echo"<tr><td>{$row['sid']}</td>
                     <td>{$row['sdealer']}</td>
                     <td>{$row['semail']}</td>
                     <td>{$row['sphone']}</td>
                     <td><a href='editlist.php?name=supplier&id={$row['sid']}'>Edit</a></td>
                     </tr>";
                }
                echo"</table></div></div>";
            }//end supplier

            //employee
            elseif(!strcmp(strtolower($_GET['list']),"employee")){
                echo"<h1><span>List of ".ucfirst($_GET['list'])."</span></h1>";
                echo"<div id='contentbox'><div id='data'><table id='itemList' ><tr><th>ID</th><th>Ime</th><th>Placa</th><th>Admin</th><th>Dob</th><th>Telefon</th><th>Adresa</th><th>OIB</th><th>Opcije</th></tr>";
                $slist = mysqli_query($connect, "SELECT id, first_name, last_name, salary, admin, dob, phone_number, address, uid FROM employee");
                while($row = mysqli_fetch_array($slist)){
                    echo"<tr><td>{$row['id']}</td>
                     <td>{$row['first_name']}&nbsp;{$row['last_name']}</td>
                     <td>{$row['salary']}</td>
                     <td>{$row['admin']}</td>
                     <td>{$row['dob']}</td>
                     <td>{$row['phone_number']}</td>
                     <td>{$row['address']}</td>
                     <td>{$row['uid']}</td>
                     <td><a href='editlist.php?name=employee&id={$row['id']}'>Edit</a></td>
                     </tr>";
                }
            }//end employee

            else {
                echo"<h1><span><a href='viewlist.php?list=Product'>Lista proizvoda</a></span></h1>
                 <h1><span><a href='viewlist.php?list=Supplier'>Lista dobavljača</a></span></h1>
                 <h1><span><a href='viewlist.php?list=Employee'>Lista zaposlenih</a></span></h1>";
            }
        }//main
        else {
            echo"<h1><span><a href='viewlist.php?list=Product'>Lista proizvoda</a></span></h1>
             <h1><span><a href='viewlist.php?list=Supplier'>Lista dobavljača</a></span></h1>
             <h1><span><a href='viewlist.php?list=Employee'>Lista zaposlenih</a></span></h1>";
        }
        ?>
    </div>
</div>

<?php
//require_once("include/footer.php");
?>