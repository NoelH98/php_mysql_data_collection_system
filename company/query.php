<?php include('../configs.php') ?>
<?php 

    session_start();
	// variable declaration
	$status = "";
	$date = "";
	$comment = "";
	$client = "";
	
	$username = $_SESSION['username'];

	$errors = array(); 
	$_SESSION['success'] = "";
	

	if (isset($_POST['query_user'])) {
		
		// receive all input values from the form
		$status = mysqli_real_escape_string($dbconnection, $_POST['status']);
		$date = mysqli_real_escape_string($dbconnection, $_POST['date']);
		$comment = mysqli_real_escape_string($dbconnection, $_POST['comment']);
		$company = $_SESSION['username'];
		
		// username id query
	    $query_id = "SELECT ID FROM users WHERE username ='$username'";
        $result = mysqli_query($dbconnection,$query_id);
		if(mysqli_num_rows($result)>0){$row_user = mysqli_fetch_assoc($result);}
		$username_id = $row_user['ID'];
		
		//getting client
	    $query_user = mysqli_query($dbconnection,"SELECT client FROM rating WHERE username='$username_id' AND category !='Complement' AND query_status='No'")or die (mysqli_error($dbconnection));
        if(mysqli_num_rows($query_user)>0){$row_client = mysqli_fetch_assoc($query_user);}
		$client = $row_client ['client'];
		
		// form validation: ensure that the form is correctly filled
		if (empty($status)) { array_push($errors, "Status is required"); }
		if (empty($date)) { array_push($errors, "Date is required"); }
		if (empty($comment)) { array_push($errors, "Comment is required"); }
			
			
		if (count($errors) == 0) {
			
	    	$query = "UPDATE rating SET responce_date='2018-6-11' , query_status='Yes' , user_comment='hello kenyans' WHERE query_status='No' AND client='$client' AND username = '$username_id' ORDER BY id LIMIT 1";
			mysqli_query($dbconnection, $query);

			$_SESSION['success'] = "Query successfully updated";
			header('location:rating.php'); 
		}

	}

?>