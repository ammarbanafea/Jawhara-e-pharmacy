<?php
	//session_start();

	// connect to database
    $con = mysqli_connect("localhost","root","","jawhara");
    // Check connection
    if (mysqli_connect_errno()){
        echo "Failed to connect to MySQL: " . mysqli_connect_error(); 
    }

	$errors   = array(); 

	// call the login() function if register_btn is clicked
	if (isset($_POST['login_btn'])) {
		login();
	}

	//Login user
	function login(){
		global $con, $username, $errors;
		
		//grap from values
        $username = stripslashes($_REQUEST['username']);
        $username = mysqli_real_escape_string($con, $username);
		
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($con, $password);
		
		// attempt login if no errors on form
		if (count($errors) == 0) {
			$password = md5($password);
			
			$query = "SELECT * FROM users WHERE username='$username' AND password='$password' LIMIT 1";
			$results = mysqli_query($con, $query);
			
			if (mysqli_num_rows($results) == 1) { // user found
				
				// check if user is admin or user
				$logged_in_user = mysqli_fetch_assoc($results);
				if ($logged_in_user['user_type'] == 'admin') {
					
					$_SESSION['user'] = $logged_in_user;
					$_SESSION['success']  = "You are now logged in";
					
					header('location: admin/admin.php');
				}
				
				else {
					$_SESSION['user'] = $logged_in_user;
					$_SESSION['success']  = "You are now logged in";
					
					header('location: index.php');
				}

				} else {
					//erroe massege if username or password not correcct
					array_push($errors, "Incorrect Username/password"); 	
				}
			}
	}

	//Functions to check user type
	//If the user type is admin, will redirect to admin page 
	function isAdmin()
	{
		if (isset($_SESSION['user']) && $_SESSION['user']['user_type'] == 'admin' ) {
			return true;
		}else{
			return false;
		}
	}

	//If user type is user, will redirect to the homepage (index)
	function isLoggedIn()
	{
		if (isset($_SESSION['user'])) {
			return true;
		}else{
			return false;
		}
	}

	//Function to show error while login
	function display_error() {
		global $errors;

		if (count($errors) > 0){
			echo '<div class="error">';
				foreach ($errors as $error){
					echo $error .'<br>';
				}
			echo '</div>';
		}
	}
?>
