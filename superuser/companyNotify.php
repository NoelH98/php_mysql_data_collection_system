<?php include('../configs.php') ?>
<?php 

    // variable declaration
	$username = "";
	$address = "";
	$sector = "";
	
	$errors = array(); 
	$_SESSION['success'] = "";

	 if (isset($_POST['delete_company'])) {
		 
        $username = mysqli_real_escape_string($dbconnection, $_POST['username']);
		$password_1 = mysqli_real_escape_string($dbconnection, $_POST['password']);
		$address = mysqli_real_escape_string($dbconnection, $_POST['address']);
		$sector = mysqli_real_escape_string($dbconnection, $_POST['sector']);
         
	    // form validation: ensure that the form is correctly filled
		if (empty($username)) { array_push($errors, "Already existing username is required"); }
		if (empty($password_1)) { array_push($errors, "Account password is required"); }
		if (empty($address)) { array_push($errors, "Address is required"); }
		if (empty($sector)) {array_push($errors, "Sector is required");}
		
		//getting company user id for deletion
	    $query_id = "SELECT id FROM users WHERE username ='$username'";
	    $result = mysqli_query($dbconnection,$query_id);
	    if(mysqli_num_rows($result)>0){$row = mysqli_fetch_assoc($result);}
		
		 $username_id = $row['id'];
		
		// update client info if there are no errors in the form
		if (count($errors) == 0) {
	    	
			$query2 = "DELETE FROM rating WHERE username='$username_id'";
			mysqli_query($dbconnection, $query2);
			

			$_SESSION['success'] = "info has been deleted";
			header('location:index.php');
		}
		
	 }
?>