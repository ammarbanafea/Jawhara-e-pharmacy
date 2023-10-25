<html>
<head>
    <meta charset="utf-8"/>
    <title>Registration | Jawhara</title>
	<link rel="stylesheet" href="style.css"/>

</head>
<body>
<?php
    require('dbconnect.php');
    // When form submitted, insert values into the database.
    if (isset($_REQUEST['username'])) {
		
		//escapes special characters in a string
		$username = mysqli_real_escape_string($con, $_REQUEST['username']);
		
		$email = mysqli_real_escape_string($con, $_REQUEST['email']);
		
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($con, $password);
		
        $fullName    = stripslashes($_REQUEST['fullName']);
        $fullName    = mysqli_real_escape_string($con, $fullName);

        $address    = stripslashes($_REQUEST['address']);
        $address    = mysqli_real_escape_string($con, $address);
		
		$phoneNumber    = stripslashes($_REQUEST['phoneNumber']);
        $phoneNumber    = mysqli_real_escape_string($con, $phoneNumber);
		
        $create_datetime = date("Y-m-d H:i:s");
		
		//Check if username already exists
		$check_duplicate_username = "SELECT username FROM users WHERE username = '$username' ";
		$result = mysqli_query($con, $check_duplicate_username);
		$count = mysqli_num_rows($result);
		
		if($count > 0){
			echo '<script>alert("Username already taken. Please use another username!")</script>';
			echo '<script>window.location="register.php"</script>';
			return false;
		}
		
		//Check password at least 6 characters
		if(strlen($password) < 6) {
			echo '<script>alert("Password must be at least 6 characters long!")</script>';
			echo '<script>window.location="register.php"</script>';
			return false;
		}
		
		//Check if email already exists
		$check_duplicate_email = "SELECT email FROM users WHERE email = '$email' ";
		$result = mysqli_query($con, $check_duplicate_email);
		$count = mysqli_num_rows($result);
		
		if($count > 0){
			echo '<script>alert("E-mail already taken. Please use another E-mail!")</script>';
			echo '<script>window.location="register.php"</script>';
			return false;
		}
		
		//Check validate email
		if(strpos($email, '@') == false || strpos($email, '.') == false){
			echo '<script>alert("Please use a valid email!")</script>';
			echo '<script>window.location="register.php"</script>';
			return false;
		} 

		//If no error in the form, create new user
        $query    = "INSERT into `users` (username, password, email, fullName, address, phoneNumber, create_datetime)
                     VALUES ('$username', '" . md5($password) . "', '$email', '$fullName', '$address', '$phoneNumber', '$create_datetime')";
        
		$result   = mysqli_query($con, $query);
        if ($result) {
            echo "<div class='success'>
                  	<h3>Congratulation you have successfully registered.</h3><br/>
                  	<p class='link'><a href='login.php'>Click here to Login</a></p>
                  </div>";
        }

    } else {
?>
	<!-- If website logo clicked, redirect to homepage -->
	<header><a href='index.php'><img src="images/logo.png" width="300" height="100" class="center" /></a></header>
	
	<div class="header">
  		<h2>Registration</h2>
	</div>
	
	<form method="post" action="register.php">
		
		<div class="input-group">
			<label>Username</label>
			<input type="text" name="username" required>
		</div>
		
		<div class="input-group">
			<label>Password</label>
			<input type="password" name="password" required>
			<small><i>Password must be at least 6 characters</i></small>
		</div>
		
		<div class="input-group">
			<label>E-mail</label>
			<input type="text" name="email" required>
		</div>
		
		<div class="input-group">
			<label>Full Name</label>
			<input type="text" name="fullName" required>
		</div>
		
		<div class="input-group">
			<label>Address</label>
			<input type="text" name="address" required>
		</div>
		
		<div class="input-group">
			<label>Phone Number</label>
			<input type="text" name="phoneNumber" required>
		</div>
		
		<div class="input-group">
			<button type="submit" class="button" name="submit"><span><strong>Register</strong></span></button>
		</div>
		
        <p class="link">You already have an account? <a href="login.php">Click to login</a></p>
		
	</form>
	
<?php
    }
?>
</body>
</html>
