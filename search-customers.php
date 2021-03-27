<?php
require_once("db-establsih.php");
    if(isset($_GET['submit']))
    {
        $searchKeyWord = $_GET['search_keyword'];
        #check
        if (empty($searchKeyWord)) {
            echo "plz insert a word";
        } else 
        {
            $query = "SELECT * FROM `customers` WHERE customerName LIKE '%$searchKeyWord%'";
            $result = mysqli_query($conn,$query);
            $allCustoms = mysqli_fetch_all($result,MYSQLI_ASSOC);
        }
    }
?>
    <form method="GET" action="search-customers.php">
        <input type="search" name="search_keyword"> <br>
        <input type="submit" name="submit" value="submit">
    </form>
    <?php 
    if (!empty($allCustoms)) {
        foreach ($allCustoms as $customer) { 
            echo $customer['customerName']."<br>";
        }
    }