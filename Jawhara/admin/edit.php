<?php
	session_start();
	include("../dbconnect.php");

	//Call function prevent the page from any unauthorized access
	if (!isAdmin()) {
		header('location: ../index.php');
	}

	$result = mysqli_query($con, "SELECT * FROM products ORDER BY productID DESC"); 

 	if(isset($_POST['update'])) {
		$productID = $_POST['productID'];
		
		$productCode = $_POST['productCode'];
		$productName =$_POST['productName'];
		$productDesc=$_POST['productDesc'];
		$productPrice = $_POST['productPrice'];
		$productImage = $_POST['productImage']; 
		
	if(empty($productCode) || empty($productName) || empty($productDesc) || empty($productPrice) || empty($productImage)) {
			
		if(empty($productCode)) {
			echo "<font color='red'>Product code field is empty.</font><br/>";
		}
		
		if(empty($productName)) {
			echo "<font color='red'>Product name field is empty.</font><br/>";
		}
			
		if(empty($productDesc)) {
			echo "<font color='red'>Product description field is empty.</font><br/>";
		}
			
		if(empty($productPrice)) {
			echo "<font color='red'>Product price field is empty.</font><br/>";
		}
			
		if(empty($productImage)) {
			echo "<font color='red'>Product image field is empty.</font><br/>";
		}
	}
		else {
		 	$result = mysqli_query($con, "UPDATE products SET productCode='$productCode', productName='$productName', productDesc='$productDesc', productPrice='$productPrice', productImage='$productImage' WHERE productID=$productID");
				
			echo '<script>alert("Product update successfully!")</script>';
			echo '<script>window.location="product_management.php"</script>';
		}
	}
?>

<?php
	//getting id from url
	$productID = $_GET['productID'];
 
	//selecting data associated with this particular id
	$result = mysqli_query($con, "SELECT * FROM products WHERE productID=$productID");
 
	while($res = mysqli_fetch_array($result)) {
		
		$productCode  = $res['productCode'];
		$productName  = $res['productName'];
		$productDesc  = $res['productDesc'];
		$productPrice = $res['productPrice'];
		$productImage = $res['productImage'];
	}
?>

<html>
<head>    
	<title>Edit Product | Jawhara</title>
	<link rel="stylesheet" type="text/css" href="../style.css">
</head>
 
<body>
	<div class="headerAdmin">
		<h2>Edit Product</h2>
	</div>
   
    
    <form name="form1" method="post" action="edit.php">
        
		<div class="input-group">
			<label>Product Code</label>
		<input type="text" class="input-group" name="productCode" value="<?php echo $productCode;?>" required>
		</div>
		
		<div class="input-group">
			<label>Product Name</label>
		<input type="text" class="input-group" name="productName" value="<?php echo $productName;?>" required>
		</div>
		
		<div class="input-group">
			<label>Product Description</label>
			<textarea rows="6" cols="36" name="productDesc" value="" required><?php echo $productDesc;?></textarea>
		</div>
		
		<div class="input-group">
			<label>Product Price</label>
			<input type="text" class="input-group" name="productPrice" value="<?php echo $productPrice;?>" required>
		</div>
		
		<div class="input-group">
			<label>Product Image</label>
			<form method="post" enctype="multipart/form-data">
			<input type="file"  name="productImage" class="input-group" required>
		</div>	
		
		<div class="input-group">
			<input type="hidden" name="productID" value=<?php echo $_GET['productID'];?>>
			<button type="submit" name="update" class="buttonAdd"><span><strong>Update</strong></span></button>	
			
			<p></p>
			
			<button type="submit" class="button" onclick="window.location.href = 'product_management.php';"><span><strong>View Products</strong></span></button>
			
			<p></p>
			
			<button type="submit" class="buttonReturn" onclick="window.location.href = 'admin.php';"><span><strong>Return to Admin page</strong></span></button>
		</div>	
    </form>
</body>
</html>