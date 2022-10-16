<?php include('../configs.php') ?>
<?php 

    // variable declaration
	$username = "";
	$address = "";
	$sector = "";
	
	$errors = array(); 
	$_SESSION['success'] = "";

	 if (isset($_POST['update_company'])) {
		 
        $username = mysqli_real_escape_string($dbconnection, $_POST['username']);
		$password_1 = mysqli_real_escape_string($dbconnection, $_POST['password']);
		$address = mysqli_real_escape_string($dbconnection, $_POST['address']);
		$sector = mysqli_real_escape_string($dbconnection, $_POST['sector']);
         
	    // form validation: ensure that the form is correctly filled
		if (empty($username)) { array_push($errors, "Already existing username is required"); }
		if (empty($password_1)) { array_push($errors, "New password is required"); }
		if (empty($address)) { array_push($errors, "Address is required"); }
		if (empty($sector)) {array_push($errors, "Sector is required");}
		
		// update client info if there are no errors in the form
		if (count($errors) == 0) {
			$password = md5($password_1);//encrypt the password before saving in the database
	    	$query = "UPDATE users SET password='$password' , address='$address' , sector='$sector'  WHERE username='$username'";
			mysqli_query($dbconnection, $query);

			$_SESSION['success'] = "info has been updated";
			header('location:index.php');
		}
		
	 }
?>