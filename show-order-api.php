<?php
require_once("db-establsih.php");
    if (isset($_GET['submit'])) {
        $orderNumber = $_GET['number'];
        #check
        if (empty($orderNumber)) {
            echo "plz insert the order number";
        } elseif (! is_numeric($orderNumber)) {
            echo "plz insert a valid order number";
        }
         else {
            $query = "SELECT * FROM `orders` WHERE orderNumber = $orderNumber";
            $result = mysqli_query($conn,$query);
            $orderDetails = mysqli_fetch_assoc($result);
            $orderApi = json_encode($orderDetails);
            if ( !empty($orderApi) ) {
                print_r($orderApi);
            } else {
                #whyyyyyyyyyyyyyyyyyyyyyyyyyyyy returns null ?????????
                echo 'no data found';
            }
            
        }
    }
?>
<form method="GET" action="show-order-api.php">
        <input type="number" name="number"> <br>
        <input type="submit" name="submit" value="submit">
</form>