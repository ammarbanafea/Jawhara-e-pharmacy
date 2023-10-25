<?php
include("../dbconnect.php");
 
$productID = $_GET['productID'];
 
$result = mysqli_query($con, "DELETE FROM products WHERE productID=$productID");
 
header("Location:product_management.php");
?>