<?php include('../configs.php') ?>
<?php 

    // variable declaration
	$username = "";
	$title = "";
	$user_id = "";
	$errors = array(); 
	$_SESSION['success'] = "";

	 if (isset($_POST['reg_user'])) {
        $username = mysqli_real_escape_string($dbconnection, $_POST['username']);
		$title = mysqli_real_escape_string($dbconnection, $_POST['title']);
		 
	    // form validation: ensure that the form is correctly filled
		if (empty($username)) { array_push($errors, "Company name is required"); }
		if (empty($title)) { array_push($errors, "Title of branch is required"); }
		
		// add branch if there are no errors in the form
		if (count($errors) == 0) {
			$query_id = "SELECT ID FROM users WHERE username='$username'";
			$result = mysqli_query($dbconnection,$query_id);
			
			if(mysqli_num_rows($result)>0){
				$row = mysqli_fetch_assoc($result);
				$user_id = $row['ID'];
			}
			
			$query = "DELETE FROM branches WHERE username='$username' AND title='$title'";
			mysqli_query($dbconnection, $query);
			

			$_SESSION['username'] = $username;
			$_SESSION['success'] = "Branch has been added";
			header('location:rating.php');
		}
		
	 }
?>