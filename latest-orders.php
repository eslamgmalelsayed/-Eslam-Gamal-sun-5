<?php
require_once("db-establsih.php");
    if(isset($_GET['submit']))
    {
        $limit = $_GET['number'];
        #check
        if (! is_numeric($limit)){
            echo 'must be a num';
        } elseif ($limit <= 0)
        {
            echo 'must be > 0';
        }
         else
        {
        $query = "SELECT orderNumber FROM orders ORDER BY orderDate DESC LIMIT $limit";
        $result = mysqli_query($conn,$query);
        $orders = mysqli_fetch_all($result,MYSQLI_ASSOC);        
    }}
?>
<form method="GET" action="latest-orders.php">
    <input type="number" name="number"> <br>
    <input type="submit" name="submit" value="submit">
</form>
    <?php
    if (!empty($orders)) {
        foreach ($orders as $order) {
           echo $order['orderNumber']."<br>";
        }
    }
    ?>
    

