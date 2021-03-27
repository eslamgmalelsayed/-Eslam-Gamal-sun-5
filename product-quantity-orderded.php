<?php
require_once("db-establsih.php");
    if(isset($_GET['submit']))
    {
        $productName = $_GET['product_name'];
        $query = "SELECT productName,COUNT(orderdetails.quantityOrdered) AS quantity FROM products JOIN orderdetails ON products.productCode = orderdetails.productCode WHERE productName = '$productName'";
        $result = mysqli_query($conn,$query);
        $total = mysqli_fetch_all($result,MYSQLI_ASSOC);
    }
?>
    <form method="GET" action="product-quantity-orderded.php">
        <input type="text" name="product_name"> <br>
        <input type="submit" name="submit" value="submit">
    </form>
    <?php 
    if (!empty($total)) {
        foreach ($total as $quantity) { 
            echo $quantity['quantity'];
        }
    }
    

