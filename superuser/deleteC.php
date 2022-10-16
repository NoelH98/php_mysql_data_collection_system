<?php include('../configs.php') ?>
<?php 

    // variable declaration
	$username = "";
	$phone_number = "";
	
	$errors = array(); 
	$_SESSION['success'] = "";

	 if (isset($_POST['delete_client'])) {
		 
        $username = mysqli_real_escape_string($dbconnection, $_POST['username']);
		$password_1 = mysqli_real_escape_string($dbconnection, $_POST['password']);
		$phone_number = mysqli_real_escape_string($dbconnection, $_POST['phone_number']);
         
	    // form validation: ensure that the form is correctly filled
		if (empty($username)) { array_push($errors, "Already existing username is required"); }
		if (empty($password_1)) { array_push($errors, "Account password is required"); }
		if (empty($phone_number)) { array_push($errors, "Phone_number is required"); }
		
		// DELETE client info if there are no errors in the form
		if (count($errors) == 0) {
	
	    	$query = "DELETE FROM clients WHERE password='$password' , phone_number='$phone_number', Username='$username'";
			mysqli_query($dbconnection, $query);

			$_SESSION['success'] = "info has been delete";
			header('location:index.php');
		}
		
	 }
?>