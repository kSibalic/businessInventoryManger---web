<?php
require_once("include/header.php");
$connect = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD, DB_NAME);
mysqli_set_charset($connect, 'utf8mb4');

if (!$connect) {
    die("Povezivanje NIJE uspjelo!: " . mysqli_connect_error());
}

$query = "SELECT product.product_id, product.product_name, product.quantity, product.market_price, product.supplier_id, supplier.sdealer FROM product INNER JOIN supplier ON product.supplier_id = supplier.sid;";
$result = mysqli_query($connect, $query);

if (!$result) {
    die("Query failed: " . mysqli_error($connect));
}
?>

<div id="body">
    <?php include_once("include/left_content.php"); ?>
    <div class="rcontent">
        <h1><span>Popis proizvoda:</span></h1>
        <div id='contentbox'>
            <div id='data'>
                <table id='itemList'>
                    <thead>
                    <tr style="background-color: #3ab520">
                        <th>ID</th>
                        <th>Naziv</th>
                        <th>Kolicina</th>
                        <th>Dobavljac</th>
                        <th>Cijena</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . htmlspecialchars($row['product_id']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['product_name']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['quantity']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['sdealer']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['market_price']) . "</td>";
                        echo "</tr>";
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php
require_once("include/footer.php");
?>
