<?php include('query.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>SP SYSTEM</title>
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
			<form class="contact100-form validate-form" method="post" action="query.php">
			     <?php include('errors.php'); ?>
				<span class="contact100-form-title">
					Query Status!
				</span>
				
				<div class="wrap-input100 input100-select">
					<span class="label-input100">Would you like to give a response?</span>
					<div>
						<select size="1" name="status" value="<?php echo $status; ?>">
							<option>Choose answer</option>
							<option>Yes</option>
							<option>No</option>
						</select>
					</div>
					<span class="focus-input100"></span>
				</div>
				
				<div class="wrap-input100 validate-input">
			       <span class="label-input100">Response Date</span>
			       <input type="date" name="date" value="<?php echo date("Y-m-d"); ?>">
				   <span class="focus-input100"></span>
		        </div>

				<div class="wrap-input100 validate-input">
					<span class="label-input100">Message</span>
					<textarea class="input100" name="comment" placeholder="Your message here..." value="<?php echo $comment; ?>" ></textarea>
					<span class="focus-input100"></span>
				</div>

				<div class="container-contact100-form-btn">
					<div class="wrap-contact100-form-btn">
						<div class="contact100-form-bgbtn"></div>
						<button class="contact100-form-btn" name="query_user">
							<span>
								Submit
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