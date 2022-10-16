<?php include ('server.php')?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>SP SYSTEM COMPANY</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="../images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="../vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="../vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../css/util.css">
	<link rel="stylesheet" type="text/css" href="../css/main.css">
<!--===============================================================================================-->
</head>
<body style="background-color: #999999;">
	
	<div class="limiter">
		<div class="container-login100">
			<div class="login100-more" style="background-image: url('images/bg-01.jpg');"></div>
                <div class="wrap-login100 p-l-50 p-r-50 p-t-72 p-b-50">
			
				 <form method="post" action="reg.php" class="login100-form validate-form">
				   <?php include('errors.php'); ?>
					<span class="login100-form-title p-b-59">
						Sign Up
					</span>
					
					<div class="wrap-input100 validate-input" data-validate="Company Name is required">
						<span class="label-input100">Name of the institution/company:</span>
						<input class="input100" type="text" name="username" placeholder="Company Name..." value="<?php echo $username; ?>">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Valid address is required">
						<span class="label-input100">Physical address: Country-City or state-area-street-building</span>
						<input class="input100" type="text" name="text" placeholder="Physical address..." value="<?php echo $address; ?>">
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
					
					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<span class="label-input100">Password</span>
						<input class="input100" type="password" name="password_1" placeholder="*************">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Password confirmation is required">
						<span class="label-input100">Repeat Password</span>
						<input class="input100" type="password" name="password_2" placeholder="*************">
						<span class="focus-input100"></span>
					</div>
		
					<div class="flex-m w-full p-b-33">
						<div class="contact100-form-checkbox" data-validate="You need to agree to the terms and conditions">
							<input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
							<label class="label-checkbox100" for="ckb1">
								<span class="txt1">
									I agree to the
									<a href="../terms.html" class="txt2 hov1">
										Terms of User
									</a>
								</span>
							</label>
						</div>

						
					</div>

					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn" type="submit" name="reg_user">
								Sign Up
							</button>
						</div>

						<a href="login.php" class="dis-block txt3 hov1 p-r-30 p-t-10 p-b-10 p-l-30">
							Sign in
							<i class="fa fa-long-arrow-right m-l-5"></i>
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	
<!--===============================================================================================-->
	<script src="../vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="../vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="../vendor/bootstrap/js/popper.js"></script>
	<script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="../vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="../vendor/daterangepicker/moment.min.js"></script>
	<script src="../vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="../vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="../js/main.js"></script>

</body>
</html>