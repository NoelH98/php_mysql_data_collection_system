<?php 
	session_start();

	// variable declaration
	$username = "";
	$email    = "";
	$first_name = "";
	$last_name = "";
	$gender = "";
	$phone_number = "";
	$date_of_birth = "";
	$marital_status = "";
	$employment_status = "";
	$education_level = "";
	$nationality = "";
	$hobbies = "";
	$errors = array(); 
	$_SESSION['success'] = "";

	// connect to database
	$db = mysqli_connect('localhost', 'root', '', 'clientsdirectory');

	// REGISTER USER
	if (isset($_POST['reg_user'])) {
		// receive all input values from the form
		$username = mysqli_real_escape_string($db, $_POST['username']);
		$email = mysqli_real_escape_string($db, $_POST['email']);
		$password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
		$password_2 = mysqli_real_escape_string($db, $_POST['password_2']);
		$first_name = mysqli_real_escape_string($db, $_POST['first_name']);
		$last_name = mysqli_real_escape_string($db, $_POST['last_name']);
		$gender = mysqli_real_escape_string($db, $_POST['gender']);
		$phone_number = mysqli_real_escape_string($db, $_POST['phone_number']);
		$date_of_birth = mysqli_real_escape_string($db, $_POST['date_of_birth']);
		$marital_status = mysqli_real_escape_string($db, $_POST['marital_status']);
		$employment_status = mysqli_real_escape_string($db, $_POST['employment_status']);
		$education_level = mysqli_real_escape_string($db, $_POST['education_level']);
		$nationality = mysqli_real_escape_string($db, $_POST['nationality']);
		$hobbies = mysqli_real_escape_string($db, $_POST['hobbies']);

		// form validation: ensure that the form is correctly filled
		if (empty($username)) { array_push($errors, "Username is required"); }
		if (empty($email)) { array_push($errors, "Email is required"); }
		if (empty($password_1)) { array_push($errors, "Password is required"); }
		if (empty($first_name)) { array_push($errors, "First name is required"); }
        if (empty($last_name)) { array_push($errors, "Last name is required"); }
        if (empty($gender)) { array_push($errors, "Gender is required"); }
        if (empty($phone_number)) { array_push($errors, "Phone number is required"); }
        if (empty($date_of_birth)) { array_push($errors, "Date of birth is required"); }
        if (empty($marital_status)) { array_push($errors, "Marital status is required"); }
        if (empty($employment_status)) { array_push($errors, "Employment_status is required"); }
        if (empty($education_level)) { array_push($errors, "Education is required"); }
        if (empty($nationality)) { array_push($errors, "Nationality is required"); }
        if (empty($hobbies)) { array_push($errors, "Hobbies are/is required"); }
		
		$sql = "SELECT * FROM clients WHERE Username='$username'";
		$sql_e = "SELECT * FROM clients WHERE Email='$email'";
		$res_u = mysqli_query($db,$sql);
		$res_e = mysqli_query($db,$sql);
		
		if(mysqli_num_rows($res_u)>0){
			array_push($errors, "Sorry...Username already taken");
		}
		
		if(mysqli_num_rows($res_e)>0){
			array_push($errors, "Sorry...email already taken");
		}

		if ($password_1 != $password_2) {
			array_push($errors, "The two passwords do not match");
		}

		// register user if there are no errors in the form
		if (count($errors) == 0) {
			$password = md5($password_1);//encrypt the password before saving in the database
			$query = "INSERT INTO clients (username,password , email ,first_name , last_name ,gender,phone_number,date_of_birth,marital_status,
			                               employment_status,education_level,nationality,hobbies) 
					  VALUES('$username','$password', '$email' ,'$first_name','$last_name','$gender','$phone_number','$date_of_birth','$marital_status',
					         '$employment_status','$education_level','$nationality','$hobbies')";
			mysqli_query($db, $query);

			$_SESSION['username'] = $username;
			$_SESSION['success'] = "You are now logged in";
			header('location:../index.php');
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
			$query = "SELECT * FROM clients WHERE username='$username' AND password='$password'";
			$results = mysqli_query($db, $query) or die('Invalid query:'.mysql_error());

			if (mysqli_num_rows($results) == 1) {
				$_SESSION['username'] = $username;
				$_SESSION['success'] = "You are now logged in";
				header('location:../index.php');
			}else {
				array_push($errors, "Wrong username/password combination");
			}
		}
	}
    mysqli_close($db);
?>