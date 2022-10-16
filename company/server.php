<?php 
	session_start();

	// variable declaration
	$username = "";
	$address = "";
	$sector = "";
	$errors = array(); 
	$_SESSION['success'] = "";

	// connect to database
	$db = mysqli_connect('localhost', 'root', '', 'clientsdirectory');

	// REGISTER USER
	if (isset($_POST['reg_user'])) {
		// receive all input values from the form
		$username = mysqli_real_escape_string($db, $_POST['username']);
		$address = mysqli_real_escape_string($db, $_POST['address']);
		$password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
		$password_2 = mysqli_real_escape_string($db, $_POST['password_2']);
		$sector = mysqli_real_escape_string($db, $_POST['sector']);
		
		// form validation: ensure that the form is correctly filled
		if (empty($username)) { array_push($errors, "Username is required"); }
		if (empty($address)) { array_push($errors, "Physical Address is required"); }
		if (empty($password_1)) { array_push($errors, "Password is required"); }
		if (empty($sector)) { array_push($errors, "Sector is required"); }
        
		$sql = "SELECT * FROM users WHERE username='$username'";
		$res_u = mysqli_query($db,$sql);
		
		if(mysqli_num_rows($res_u)>0){
			array_push($errors, "Sorry...Name already taken");
		}
		if ($password_1 != $password_2) {
			array_push($errors, "The two passwords do not match");
		}
		// register user if there are no errors in the form
		if (count($errors) == 0) {
			$password = md5($password_1);//encrypt the password before saving in the database
			$query = "INSERT INTO users (username,password,address,sector) VALUES('$username','$password', '$address' ,'$sector')";
			
			mysqli_query($db, $query);

			$_SESSION['username'] = $username;
			$_SESSION['success'] = "You are now logged in";
			header('location: index.php');
		}

	}

	// ... 

	// LOGIN USER
	if (isset($_POST['login_user'])) {
		$username = mysqli_real_escape_string($db, $_POST['username']);
		$password = mysqli_real_escape_string($db, $_POST['password']);

		if (empty($username)) {
			array_push($errors, "Username is required");
		}
		if (empty($password)) {
			array_push($errors, "Password is required");
		}

		if (count($errors) == 0) {
			$password = md5($password);
			$query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
			$results = mysqli_query($db, $query);

			if (mysqli_num_rows($results) == 1) {
				$_SESSION['username'] = $username;
				$_SESSION['success'] = "You are now logged in";
				header('location: interface.php');
			}else {
				array_push($errors, "Wrong username/password combination");
			}
		}
	}
     mysqli_close($db);
?>