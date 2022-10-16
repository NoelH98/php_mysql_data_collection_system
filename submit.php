
<?php include('configs.php') ?>
<?php 

	// variable declaration
	$username = "";
	$service = "";
	$category = "";
	$branch = "";
	$comment ="";
	$client = "";
	$rate = "";
	$date = "";

	$errors = array();
	$_SESSION['success'] = "";

	// REGISTER USER
	if (isset($_POST['submit_user'])) {
		// receive all input values from the form
		$username = mysqli_real_escape_string($dbconnection, $_POST['username']);
		$service = mysqli_real_escape_string($dbconnection, $_POST['service']);
		$category = mysqli_real_escape_string($dbconnection, $_POST['category']);
		$branch = mysqli_real_escape_string($dbconnection, $_POST['branch']);
		$comment = mysqli_real_escape_string($dbconnection, $_POST['comment']);
		$client = mysqli_real_escape_string($dbconnection, $_POST['client']);
		$rate = mysqli_real_escape_string($dbconnection, $_POST['rate']);
		$date = mysqli_real_escape_string($dbconnection, $_POST['date']);
		
		
		// form validation: ensure that the form is correctly filled
		if (empty($username)) { array_push($errors, "Username is required"); }
		if (empty($service)) { array_push($errors, "Service is required"); }
		if (empty($category)) { array_push($errors, "Category is required"); }
		if (empty($branch)) { array_push($errors, "Branch is required"); }
        if (empty($comment)) { array_push($errors, "Comment is required"); }
        if (empty($date)) { array_push($errors, "Valid Date is required"); }
        

		// input rating to database user if there are no errors in the form
		if (count($errors) == 0) {
			$query_gender = mysqli_query($dbconnection,"SELECT gender FROM clients WHERE Username='$client'")or die (mysqli_error($dbconnection));
	        $row_gender = mysqli_fetch_array($query_gender);
			$username_gender = $row_gender['gender'];
			
			$query = "INSERT INTO rating (username,service,category,branch,comment,client,gender,rating_value,rating_date) VALUES('$username','$service', '$category' ,'$branch','$comment','$client','$username_gender','$rate','$date')";
			mysqli_query($dbconnection, $query);

			//$_SESSION['username'] = $username;
			//$_SESSION['success'] = "You are now logged in";
			//header('location: index.php');
		}
		
		
	}
?>