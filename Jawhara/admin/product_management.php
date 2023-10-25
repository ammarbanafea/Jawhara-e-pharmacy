<?php 
	session_start();
	include('../dbconnect.php');

	if (!isAdmin()) {
		header('location: ../index.php');
	}
?>

<!-- Search function -->
<?php

if(isset($_POST['search'])) {
	$search = $_POST['search'];
	
    // search in all table columns
    // using concat mysql function
    $query = "SELECT * FROM `products` WHERE CONCAT(`prodcutCode`, `productName`, `productDesc`) LIKE '%".$search."%'";
    $search_result = filterTable($query);
}
 else {
    $query = "SELECT * FROM `products`";
    $search_result = filterTable($query);
}

// function to connect and execute the query
function filterTable($query) {
    $connect = mysqli_connect("localhost", "root", "", "jawhara");
    $filter_Result = mysqli_query($connect, $query);
    return $filter_Result;
}
?>

<html>
<head>
<meta charset="utf-8">
	<title>Product Managements | Jawhara</title>
	<link rel="stylesheet" href="../style.css" type="text/css" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	
<style>
.buttonAdd {
	font-size: 14px;
	height: 50px;
	width: 165px;
	padding: 6px 12px;
	position: absolute;
	margin-left: 1283px;
	margin-top: -115px;

}

.buttonReturn {
	font-size: 14px;
	height: 32.85px;
	width: 201px;
	padding: 6px 12px;
	margin-left: 0;
}
	
.headerAdmin {
	width: 1500px;
}
	
.form, .content {
	width: 1500px;
}
	
input[type=text] {
	width: 170px;
	box-sizing: border-box;
	border: 2px solid #ffd700;
	border-radius: 4px;
	font-size: 16px;
	background-color: white;
	background-image: url('../images/search.png');
	background-position: 10px 10px; 
	background-size: 25px;
	background-repeat: no-repeat;
	padding: 12px 20px 12px 40px;
	-webkit-transition: width 0.4s ease-in-out;
	transition: width 0.4s ease-in-out;
	margin-left: 180px;
	margin-top: -50px;
}

input[type=text]:focus {
  width: 30%;
}
	</style>
</head>
	
<body>

<div class="headerAdmin">
		<h1>Products Management</h1>
	</div>

	<form class="form" action="product_management.php" method="post" name="form1">
		
	<!-- Count total number of products -->
	<?php
	$sql="SELECT productID FROM products";

	if ($result=mysqli_query($con,$sql))
	  {
	  // Return the number of rows in result set
	  $rowcount=mysqli_num_rows($result);
	  printf("<h2>Products  (%d) \n</h2>",$rowcount);
	  // Free result set
	  mysqli_free_result($result);
	  }
	?>
		
	<input type="text" name="search" placeholder="Search..">
	
	</form>
	
	<form class="form" action="product_management.php" method="post" name="form1">
		
	<button type="button" class="buttonAdd" onclick="window.location.href = 'add.php';"><span><strong>Add Product</strong></span></button>
		
	<br></br>

	  <table class="table">
			<td width="10%"><strong>Porduct Image</strong></td>
			<td width="7%"><strong>Product 	Code</strong></td>
			<td width="10%"><strong>Product Name</strong></td>
			<td width="43%"><strong>Product Description</strong></td>
			<td width="10%"><strong>Product Price</strong></td>
			<td width="10%"><strong>Action</strong></td>

			 <!-- View and Search products -->
                <?php while($row = mysqli_fetch_array($search_result)):?>
                <tr>
					<td><div id='img_div'>
					  <img src="../images/<?php echo $row['productImage'];?>" width="100" height="100" />
					</div></td>
					
					<td><?php echo $row['productCode'];?></td>
                    <td><?php echo $row['productName'];?></td>
                    <td><?php echo $row['productDesc'];?></td>
					<td>RM<?php echo $row['productPrice'];?></td>
					<td><?php echo "<input type=\"button\" class=\"btn btn-info\" onclick=\"window.location.href = 'edit.php?productID=$row[productID]';\" value=\"Edit\"/> <a href='remove.php?productID=$row[productID]'><button type=\"button\" class=\"btn btn-danger\" onclick=\"return confirm('Are you sure you want to remove this item?')\">Remove</button>"; ?>
				 		
			
						
						</td>
					
				</tr>			
                
                <?php endwhile;?>
	  </table>
		
		<button type="button" class="buttonReturn" onclick="window.location.href = 'admin.php';"><span><strong>Return to Admin Page</strong></span></button>
		
		
	</form>		
</body>
</html>