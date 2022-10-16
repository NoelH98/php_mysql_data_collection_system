 <?php include('company.php'); ?>
 <?php 
	session_start(); 

	if (!isset($_SESSION['username'])) {
		$_SESSION['msg'] = "You must log in first";
		header('location: ../index.php');
	}

	if (isset($_GET['logout'])) {
		session_destroy();
		unset($_SESSION['username']);
		header("location: ../index.php");
	}
	
	?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>SP SYSTEM Dashboard</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="../images-1/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../vendor-1/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../fonts-1/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../vendor-1/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../vendor-1/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../vendor-1/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../vendor-1/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../vendor-1/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../css-1/util.css">
	<link rel="stylesheet" type="text/css" href="../css-1/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="container-contact100">
		<div class="wrap-contact100">
			<form class="contact100-form validate-form" method="post" action="company.php">
			    <?php include('errors.php'); ?>
				<span class="contact100-form-title">
					Company Status Update
				</span>
				
				<div class="wrap-input100 validate-input">
			       <span class="label-input100">Company name</span>
			       <input type="text" name="username" placeholder="company name..." value="<?php echo $username; ?>">
				   <span class="focus-input100"></span>
		        </div>

				
				<div class="wrap-input100 validate-input">
			       <span class="label-input100">New Password</span>
			       <input type="password" name="password" placeholder="Password..." value="<?php echo $password; ?>">
				   <span class="focus-input100"></span>
		        </div>

				<div class="wrap-input100 validate-input">
			       <span class="label-input100">New Address</span>
			       <input type="text" name="address" placeholder="address..." value="<?php echo $address; ?>">
				   <span class="focus-input100"></span>
		        </div>
				
				<div class="wrap-input100 validate-input"data-validate = "Valid Sector is required" >
			         <span class="label-input100">Sector:</span>
			         <select  size="1" name="sector" value="<?php echo $sector; ?>">
			         <option>Banking and finance</option>
			         <option>Food and beverage</option>
			         <option>Shops and Malls</option>
			         <option>Entertainment</option>
			         <option>Hotel,Accommodation & Apartments</option>
			         <option>Travel & Flights</option>
			         <option>Learning institutions</option>
			         <option>Medical care</option>
			         <option>Manufacture & Supplies</option>
			         <option>Public office & Regulators</option>
			         <option>Security</option>
			         <option>Energy</option>
			         <option>Textile</option>
			         <option>Electronics</option>
			         <option>Communications</option>
			        </select>
					<span class="focus-input100"></span>
		         </div>

				<div class="container-contact100-form-btn">
					<div class="wrap-contact100-form-btn">
						<div class="contact100-form-bgbtn"></div>
						<button class="contact100-form-btn" name="update_company">
							<span>
								Update
								<i class="fa fa-long-arrow-right m-l-7" aria-hidden="true"></i>
							</span>
						</button>
					</div>
				</div>
			</form>
		</div>
	</div>



	<div id="dropDownSelect1"></div>

<!--===============================================================================================-->
	<script src="../vendor-1/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="../vendor-1/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="../vendor-1/bootstrap/js/popper.js"></script>
	<script src="../vendor-1/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="../vendor-1/select2/select2.min.js"></script>
	<script>
		$(".selection-2").select2({
			minimumResultsForSearch: 20,
			dropdownParent: $('#dropDownSelect1')
		});
	</script>
<!--===============================================================================================-->
	<script src="../vendor-1/daterangepicker/moment.min.js"></script>
	<script src="../vendor-1/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="../vendor-1/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="../js-1/main.js"></script>

	<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-23581568-13');
</script>

</body>
</html>