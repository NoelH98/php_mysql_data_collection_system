<?php include ('server.php')?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>SP SYSTEM CLIENT</title>
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

					<div class="wrap-input100 validate-input" data-validate="UserName is required">
						<span class="label-input100">Username</span>
						<input class="input100" type="text" name="username" placeholder="Name..." value="<?php echo $username; ?>">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<span class="label-input100">Email</span>
						<input class="input100" type="text" name="email" placeholder="Email addess..." value="<?php echo $email; ?>">
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
					
					<div class="wrap-input100 validate-input" data-validate="first name is required">
						<span class="label-input100">First Name</span>
						<input class="input100" type="text" name="first_name" placeholder="First name..." value="<?php echo $first_name; ?>">
						<span class="focus-input100"></span>
					</div>
					
					<div class="wrap-input100 validate-input" data-validate="first name is required">
						<span class="label-input100">Last Name</span>
						<input class="input100" type="text" name="last_name" placeholder="Last name..." value="<?php echo $last_name; ?>">
						<span class="focus-input100"></span>
					</div>
					
                   <div class="wrap-input100 validate-input" data-validate="Gender is required">
					  <span class="label-input100">Gender</span>
			          <select size="1" name="gender" value="<?php echo $gender; ?>">
					  <option> </option>
			          <option>Male</option>
			          <option>Female</option>
			          </select>
					  <span class="focus-input100"></span>
		           </div>
				   
				   <div class="wrap-input100 validate-input" data-validate="phone number is required">
						<span class="label-input100">Phone Number</span>
						<input class="input100" type="text" name="phone_number" placeholder="Phone Number..." value="<?php echo $phone_number; ?>">
						<span class="focus-input100"></span>
					</div>
					
					 <div class="wrap-input100 validate-input" data-validate="Date of birth is required">
						<span class="label-input100">Date of birth</span>
						<input class="input100" type="text" name="date_of_birth" placeholder="YYYY-MM-DD" value="<?php echo $date_of_birth; ?>">
						<span class="focus-input100"></span>
					</div>
					<div class="wrap-input100 validate-input" data-validate="Marital status is required">
					    <span class="label-input100">Married?</span>
			            <select size="1" name="marital_status" value="<?php echo $marital_status; ?>">
						<option> </option>
			            <option>Yes</option>
			            <option>No</option>
			            </select>
						<span class="focus-input100"></span>
		              </div>
					  <div class="wrap-input100 validate-input" data-validate="Employment status is required">
						  <span class="label-input100">Employed?</span>
			              <select size="1" name="employment_status" value="<?php echo $employment_status; ?>">
						  <option> </option>
			              <option>Yes</option>
			              <option>No</option>
			              </select>
						  <span class="focus-input100"></span>
					   </div>
					   
					  <div class="wrap-input100 validate-input" data-validate="Education level is required">
						<span class="label-input100">Education Level</span>
						<input class="input100" type="text" name="education_level" placeholder="Education Status...." value="<?php echo $education_level; ?>">
						<span class="focus-input100"></span>
					  </div> 
					  
					  <div class="wrap-input100 validate-input" data-validate="Nationality is required">
						   <span class="label-input100">Nationality</span>
			              <select size="1" name="nationality" value="<?php echo $nationality; ?>">
						  <option> </option>
						  <option>Afghanistan</option>
						  <option>Albania</option>
						  <option>Algeria</option>
						  <option>Andorra</option>
						  <option>Angola</option>
						  <option>Antigua and Barbuda</option>
						  <option>Argentina</option>
						  <option>Armenia</option>
						  <option>Australia</option>
						  <option>Austria</option>
						  <option>Azerbaijan</option>
						  <option>Bahamas</option>
						  <option>Bahrain</option>
						  <option>Bangladesh</option>
						  <option>Barbados</option>
						  <option>Belarus</option>
						  <option>Belgium</option>
						  <option>Belize</option>
						  <option>Benin</option>
						  <option>Bhutan</option>
						  <option>Bolivia</option>
						  <option>Bosnia and Herzegovina</option>
						  <option>Botswana</option>
						  <option>Brazil</option>
						  <option>Brunei</option>
						  <option>Bulgaria</option>
						  <option>Burkina Faso</option>
						  <option>Burundi</option>
						  <option>Cape Verde</option>
						  <option>Cambodia</option>
						  <option>Cameroon</option>
						  <option>Canada</option>
						  <option>Central African Repulic</option>
						  <option>Chad</option>
						  <option>Chile</option>
						  <option>China</option>
						  <option>Colombia</option>
						  <option>Comoros</option>
						  <option>Congo DRC</option>
						  <option>Republic of Congo</option>
						  <option>Costa Rica</option>
						  <option>Cote d'Ivoire</option>
						  <option>Croatia</option>
						  <option>Cuba</option>
						  <option>Cyprus</option>
						  <option>Czech Republic</option>
						  <option>Denmark</option>
						  <option>Djibouti</option>
						  <option>Dominica</option>
						  <option>Dominican Republic</option>
						  <option>Ecuador</option>
						  <option>Egypt</option>
						  <option>El Salvador</option>
						  <option>Equatorial Guinea</option>
						  <option>Eritrea</option>
						  <option>Estonia</option>
						  <option>Eswatini</option>
						  <option>Ethiopia</option>
						  <option>Fiji</option>
						  <option>Finland</option>
						  <option>France</option>
						  <option>Gabon</option>
						  <option>Gambia</option>
						  <option>Georgia</option>
						  <option>Germany</option>
						  <option>Ghana</option>
						  <option>Greece</option>
						  <option>Grenada</option>
						  <option>Guatemala</option>
						  <option>Guinea</option>
						  <option>Guinea Bissau</option>
						  <option>Guyana</option>
						  <option>Haiti</option>
						  <option>Hondurus</option>
						  <option>Hungary</option>
						  <option>Iceland</option>
						  <option>India</option>
						  <option>Indonesia</option>
						  <option>Iran</option>
						  <option>Iraq</option>
						  <option>Ireland</option>
						  <option>Israel</option>
						  <option>Italy</option>
						  <option>Jamaica</option>
						  <option>Japan</option>
						  <option>Jordan</option>
						  <option>Kazakhstan</option>
			              <option>Kenya</option>
						  <option>Kiribati</option>
						  <option>Kosovo</option>
						  <option>Kuwait</option>
						  <option>Kyrgyzstan</option>
						  <option>Laos</option>
						  <option>Latvia</option>
						  <option>Lebanon</option>
						  <option>Lesotho</option>
						  <option>Liberia</option>
						  <option>Libya</option>
						  <option>Liechtenstein</option>
						  <option>Lithuania</option>
						  <option>Luxembourd</option>
						  <option>Macedonia</option>
						  <option>Madagascar</option>
						  <option>Malawi</option>
						  <option>Malaysia</option>
						  <option>Maldives</option>
						  <option>Mali</option>
						  <option>Malta</option>
						  <option>Marshall Islands</option>
						  <option>Mauritania</option>
						  <option>Mauritius</option>
						  <option>Mexico</option>
						  <option>Micronesia</option>
						  <option>Moldova</option>
						  <option>Monaco</option>
						  <option>Mongolia</option>
						  <option>Montenegro</option>
						  <option>Morocco</option>
						  <option>Mozambique</option>
						  <option>Myanmar</option>
						  <option>Namibia</option>
						  <option>Nauru</option>
						  <option>Nepal</option>
						  <option>Netherlands</option>
						  <option>New Zealand</option>
						  <option>Nicaragua</option>
						  <option>Niger</option>
						  <option>Nigeria</option>
						  <option>North Korea</option>
						  <option>Norway</option>
						  <option>Oman</option>
						  <option>Pakistan</option>
						  <option>Palau</option>
						  <option>Palestine</option>
						  <option>Panama</option>
						  <option>Papau New Guinea</option>
						  <option>Paraguay</option>
						  <option>Peru</option>
						  <option>Philippines</option>
						  <option>Poland</option>
						  <option>Portugal</option>
						  <option>Qatar</option>
						  <option>Romania</option>
						  <option>Russia</option>
						  <option>Rwanda</option>
						  <option>Saint Kitts and Nevis</option>
						  <option>Saint Lucia</option>
						  <option>Saint Vicent and the Grenadines</option>
						  <option>Samoa</option>
						  <option>San Marino</option>
						  <option>Sao Tome and Principe</option>
						  <option>Saudi Arabia</option>
						  <option>Senegal</option>
						  <option>Serbia</option>
						  <option>Seychelles</option>
						  <option>Sierra Leone</option>
						  <option>Singapore</option>
						  <option>Slovakia</option>
						  <option>Slovenia</option>
						  <option>Solomon Islands</option>
						  <option>Somalia</option>
						  <option>South Africa</option>
						  <option>South Korea</option>
						  <option>South Sudan</option>
						  <option>Spain</option>
						  <option>Sri Lanka</option>
						  <option>Sudan</option>
						  <option>Suriname</option>
						  <option>Sweden</option>
						  <option>Switzerland</option>
						  <option>Syria</option>
						  <option>Taiwan</option>
						  <option>Tajikistan</option>
			              <option>Tanzania</option>
						  <option>Thailand</option>
						  <option>Timor-Leste</option>
						  <option>Togo</option>
						  <option>Tongo</option>
						  <option>Trinidad and Tobago</option>
						  <option>Tunisia</option>
						  <option>Turkey</option>
						  <option>Turkmenistan</option>
						  <option>Tuvalu</option>
						  <option>Uganda</option>
						  <option>Ukraine</option>
						  <option>United Arab Emirates</option>
						  <option>United Kingdom</option>
						  <option>United States of America</option>
						  <option>Uruguay</option>
						  <option>Uzbekistan</option>
						  <option>Vanuatu</option>
						  <option>Vatican City</option>
						  <option>Venezuela</option>
						  <option>Vietnam</option>
						  <option>Yemen</option>
						  <option>Zambia</option>
						  <option>Zimbabwe</option>
			            </select>
						<span class="focus-input100"></span>
		               </div>
					  
					    
					  <div class="wrap-input100 validate-input" data-validate="Hobbies is required">
						<span class="label-input100">Hobbies</span>
						<input class="input100" type="text" name="hobbies" placeholder="Hobbies...." value="<?php echo $hobbies; ?>">
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