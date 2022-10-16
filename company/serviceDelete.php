<?php include('serviceFx.php'); ?>
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
			<form class="contact100-form validate-form" method="post" action="serviceFx.php">
			    <?php include('errors.php'); ?>
				<span class="contact100-form-title">
					Services
				</span>
				
				<div class="wrap-input100 validate-input">
			       <span class="label-input100">Name of Service</span>
			       <input type="text" name="username" placeholder="Service Name..." value="<?php echo $username; ?>">
				   <span class="focus-input100"></span>
		        </div>
				<div class="wrap-input100 validate-input">
			       <span class="label-input100">Company Name</span>
			       <input type="text" name="company" placeholder="Company name..." value="<?php echo $company; ?>">
				   <span class="focus-input100"></span>
		        </div>
				
				<div class="container-contact100-form-btn">
					<div class="wrap-contact100-form-btn">
						<div class="contact100-form-bgbtn"></div>
						<button class="contact100-form-btn" name="reg_user">
							<span>
								Delete Service/Product
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