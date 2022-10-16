<?php include('configs.php') ?>
<?php 

	$contact_username = "";
	$contact_email = "";
	$contact_message = "";
	
	$errors = array(); 
	
     if(isset($_POST['submit_contact'])){
		 
			//receive all input from contact form
			$contact_username = mysqli_real_escape_string($dbconnection,$_POST['contact_username']);
			$contact_email = mysqli_real_escape_string($dbconnection,$_POST['contact_email']);
			$contact_message = mysqli_real_escape_string($dbconnection,$_POST['contact_message']);
			
			// form validation:ensure that the form is correctly filled
			if(empty($contact_username)){array_push($errors,"Name is required");}
			if(empty($contact_email)){array_push($errors,"Email is required");}
			if(empty($contact_message)){array_push($errors,"Message is required");}
		
		
		if(count($errors) ==0) {
			$query_contact = "INSERT INTO contacts(username,email,message) VALUES('$contact_username','$contact_email','$contact_message')";
			mysqli_query($dbconnection,$query_contact);
			
			header('location: index.php');
		}
	}	
      ?>