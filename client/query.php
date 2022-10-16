<?php include('../configs.php') ?>
<?php 

    session_start();
	// variable declaration
	$status = "";
	$date = "";
	
	$username = $_SESSION['username'];

	$errors = array(); 
	$_SESSION['success'] = "";

	if (isset($_POST['query_user'])) {
		
		// receive all input values from the form
		$status = mysqli_real_escape_string($dbconnection, $_POST['status']);
		$date = mysqli_real_escape_string($dbconnection, $_POST['date']);
		$client = $_SESSION['username'];
		
		// form validation: ensure that the form is correctly filled
		if (empty($status)) { array_push($errors, "Status is required"); }
		if (empty($date)) { array_push($errors, "Date is required"); }
			
		if (count($errors) == 0) {
			
	    	$query = "UPDATE rating SET responce_date='$date' , query_status='Yes' WHERE query_status='No' AND client='$client' ORDER BY id LIMIT 1";
			mysqli_query($dbconnection, $query);

			$_SESSION['username'] = $username;
			$_SESSION['success'] = "Query successfully updated";
			header('location:../ratings.php'); 
		}

	}

?>