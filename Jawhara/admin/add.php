<?php
	session_start();
	include('../dbconnect.php');

	//Call function prevent the page from any unauthorized access
	if (!isAdmin()) {
		header('location: ../index.php');
	}
?>

<?php
	if(isset($_POST['Submit'])) {
		$productCode  = $_POST['productCode']; 
		$productName  = $_POST['productName'];    
		$productDesc  = $_POST['productDesc'];
		$productPrice = $_POST['productPrice'];
		$productImage = $_POST['productImage'];

    if(empty($productCode) || empty($productName) || empty($productDesc) || empty($productPrice) || empty($productImage) ) {   
		
		 if(empty($productCode)) {
			 echo '<script>alert("Product code field is empty!")</script>';
			 echo '<script>window.location="add.php"</script>';
        }
		
        if(empty($productName)) {
            echo '<script>alert("Product name field is empty!")</script>';
			 echo '<script>window.location="add.php"</script>';
        }
		
		if(empty($productDesc)) {
            echo '<script>alert("Product description field is empty!")</script>';
			 echo '<script>window.location="add.php"</script>';
		}
		
       if(empty($productPrice)) {
            echo '<script>alert("Product price field is empty!")</script>';
			 echo '<script>window.location="add.php"</script>';
        } 
		
        if(empty($productImage)) {
            echo '<script>alert("Product imafe field is empty!")</script>';
			 echo '<script>window.location="add.php"</script>';
        }
	}  
		else { 
			$result = mysqli_query($con, "INSERT INTO products(productCode, productName, productDesc, productPrice, productImage) 
										  VALUES('$productCode', '$productName', '$productDesc', '$productPrice', '$productImage')");
			echo '<script>alert("Product added successfully!")</script>';
			echo '<script>window.location="product_management.php"</script>';
    }
}
?>

<html>
<head>
<meta charset="utf-8">
	<title>Add Product | Jawhara</title>
	<link rel="stylesheet" type="text/css" href="../style.css">
</head>

<body>
	<div class="headerAdmin">
		<h2>Add Product</h2>
	</div>
	
	 <form class="form" action="add.php" method="post" name="form1">
	
 		<div class="input-group">
			<label>Product Code</label>
		<input type="text" class="input-group" name="productCode">
		</div>
		 
		 <div class="input-group">
			<label>Product Name</label>
		<input type="text" class="input-group" name="productName" required>
		</div>
		
		<div class="input-group">
			<label>Product Description</label>
			<textarea rows="6" cols="36" name="productDesc" required></textarea>
		</div>
		
		<div class="input-group">
			<label>Product Price</label>
			<input type="text" class="input-group" name="productPrice" required>
		</div>
			
		<div class="input-group">
			<label>Product Image</label>
			<form method="post" enctype="multipart/form-data">
			<input type="file"  name="productImage" class="input-group" required>	
		
				
		<div class="input-group">
			<button type="submit" class="buttonAdd" name="Submit"><span><strong>Add Product</strong></span></button>
			<p></p>
			<button type="submit" class="button" onclick="window.location.href = 'product_management.php';"><span><strong>View Products</strong></span></button>
			<p></p>
			<button type="submit" class="buttonReturn" onclick="window.location.href = 'admin.php';"><span><strong>Return to Admin page</strong></span></button>
		</div>
	</form>
</body>
</html>