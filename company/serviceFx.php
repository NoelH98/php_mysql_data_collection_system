<?php include('../configs.php') ?>
<?php 

    // variable declaration
	$username = "";
	$company = "";
	$user_id = "";
	$errors = array(); 
	$_SESSION['success'] = "";


	 if (isset($_POST['reg_user'])) {
        $username = mysqli_real_escape_string($dbconnection, $_POST['username']);
		$company = mysqli_real_escape_string($dbconnection, $_POST['company']);
         
	    // form validation: ensure that the form is correctly filled
		if (empty($username)) { array_push($errors, "Name of Service/Product is required"); }
		if (empty($company)) { array_push($errors, "Company is required"); }
		
		
		// add branch if there are no errors in the form
		if (count($errors) == 0) {
			$query_id = "SELECT ID FROM users WHERE username='$company'";
			$result = mysqli_query($dbconnection,$query_id);
			
			if(mysqli_num_rows($result)>0){
				$row = mysqli_fetch_assoc($result);
				$user_id = $row['ID'];
			}
			
			$query = "DELETE FROM services WHERE username='$company' AND service_name='$username'";
			mysqli_query($dbconnection, $query);

			$_SESSION['username'] = $username;
			$_SESSION['success'] = "Service/Product has been added";
			header('location: rating.php');
		}
		
	 }
?>