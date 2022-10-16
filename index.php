<?php include('configs.php') ?>

<?php session_start();
    
	if (isset($_GET['logout'])) {
		session_destroy();
		unset($_SESSION['username']);
		header("location:index.php");
	}
?>

<?php include('submit.php') ?>
<!DOCTYPE HTML>

<html>
	<head>
		<title>SP SYSTEM</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main.css" />
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
		
		<!--Success / Failure Dialog Box -->
		<style>
		.alert{
			padding:20px;
			background-color:#85b2b1;
			color:white;
		}
		.closebtn{
			margin-left:15px;
			color:white;
			font-weight:bold;
			float:right;
			font-size:22px;
			line-height:20px;
			cursor:pointer;
			transition:0.3s;
		}
		.closebtn:hover{
			color:pink;
		}
		</style>
		
		<style>
		.left{
			float:right;
			padding: 0px 0px 20px 200px;
		}
		</style>
	</head>
	<body>
	<?php include('contact.php') ?>
	<!-- Header -->
			<div id="header">

				<div class="top">

					<!-- Logo -->
						<div id="logo">
							<span class="image avatar48"><img src="images/avatar.jpg" alt="" /><a href="superuser/login.php"></span>
							<?php  if (isset($_SESSION['username'])) : ?>
							<p>You are logged in</p>
							<h1 id="title"><strong><?php echo $_SESSION['username']; ?></strong></h1>
							<li><a href="index.php?logout='1'"style="color: red;" id="login-link" class="skel-layers-ignoreHref"><span class="icon fa-logout">Logout</span></a></li>
							<?php  elseif (!isset($_SESSION['username'])) : ?>
							<h1 id="title"><strong><?php echo $_SESSION['msg'] = "User unknown"; ?></strong></h1>
							<p>Please login</p>
							<li><a href="accounts.php" id="login-link" class="skel-layers-ignoreHref"><span class="icon fa-login">Login</span></a></li>
							<?php endif ?>
							
						</div>

					<!-- Nav -->
						<nav id="nav">
							<!--

								Prologue's nav expects links in one of two formats:

								1. Hash link (scrolls to a different section within the page)

								   <li><a href="#foobar" id="foobar-link" class="icon fa-whatever-icon-you-want skel-layers-ignoreHref"><span class="label">Foobar</span></a></li>

								2. Standard link (sends the user to another page/site)

								   <li><a href="http://foobar.tld" id="foobar-link" class="icon fa-whatever-icon-you-want"><span class="label">Foobar</span></a></li>

							-->
							<ul>
								<li><a href="#top" id="top-link" class="skel-layers-ignoreHref"><span class="icon fa-home">Home</span></a></li>
								<li><a href="#form" id="form-link" class="skel-layers-ignoreHref"><span class="icon fa-clipboard">Report Form</span></a></li>
								<li><a href="#team" id="portfolio-link" class="skel-layers-ignoreHref"><span class="icon fa-th">Our Team</span></a></li>
								<li><a href="#about" id="about-link" class="skel-layers-ignoreHref"><span class="icon fa-user">About Us</span></a></li>
								<li><a href="#contact" id="contact-link" class="skel-layers-ignoreHref"><span class="icon fa-envelope">Contact Us</span></a></li>
								<li><a href="ratings.php" id="ratings-link" class="skel-layers-ignoreHref"><span class="icon fa-star">Providers Ratings</span></a></li>
								<li><a href="#bottom" id="service-link" class="skel-layers-ignoreHref"><span class="icon fa-dollar">Service Subscription</span></a></li>
							</ul>
						</nav>

				</div>

				<div class="bottom">

					<!-- Social Icons -->
						<ul class="icons">
							<li><a href="#" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
							<li><a href="#" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
							<li><a href="#" class="icon fa-envelope"><span class="label">Email</span></a></li>
							<li><a href="#" class="icon fa-linkedin"><span class="label">LinkedIn</span></a></li>
						</ul>

				</div>

			</div>
			
			<!-- Main -->
			<div id="main">

				<!-- Intro -->
					<section id="top" class="one dark cover">
						<div class="container">

							<header>
								<h2 class="alt">Welcome to the<strong>SP SYSTEM</strong>,a easier way for clients and companies to interact<br />
							</header>

							<footer>
								<a href="#moreInfo" class="button scrolly">More Info</a>
							</footer>

						</div>
					</section>
	               <!-- More Information -->
					<section id="moreInfo" class="two">
						<div class="container">
							<header>
								<h2>The Sp System</h2>
								<p><i>Your Listener</i></p>
							</header>
                            <p>
                            The SP system is designed to assist institutions collect information from clients regarding their experience with their services.For very long
                            ,companies and institutions have been using boxes where they expect clients to write notes and post with their views. However, this method of 
                            getting information from the clients getting outdated as systems and people are going digital. Many people now have phones and are able to do similar
                            requirements of sending suggestions through phone and this bring the opportunity of tapping the gadgets that people have to improve communication regarding
                            clients' feedback to service providers.</p>
						</div>
					</section>
					
					<!-- View Reporting form -->
					<section id="form" class="three">
					    <div class="container">
					          <header>
							  <h2>Views Reporting Form</h2>
							  <p>Please note:all fields are required</p>
                              <form method="post" action="">
							  <?php include('errors.php'); ?>
                                  <?php
	  
                                       $sql = "SELECT * from users";
                                       $result = $dbconnection->query($sql);
        
                                          $sqlFramework = "SELECT * FROM `services`";
                                          $resultFramework = $dbconnection->query($sqlFramework);
                                          $rowFrameworkResult = array();
                                          if ($resultFramework->num_rows > 0) {
                                          while($rowFramework = mysqli_fetch_assoc($resultFramework)) {
                                                  $rowFrameworkResult[] = $rowFramework;
                                            }
                                }
		
		                                    $sqlBranch = "SELECT * FROM branches";
		                                    $resultBranch = $dbconnection->query($sqlBranch);
		                                    $rowBranchResult = array();
		                                    if ($resultBranch->num_rows >0){
		                                 	while($rowBranch = mysqli_fetch_assoc($resultBranch)){
				                                   $rowBranchResult[] = $rowBranch;
			                                }
	                        	}
		
                                     ?> 
							<div class="input-group">
	                        <p><i>Name of Company:</i></p>
	                        <select class ="required-entry" name="username" id="username" onchange="javascript: dynamicdropdown(this.options[this.selectedIndex].value);">	
	                         <option value="">--Please Select--</option>
	                          <?php if ($result->num_rows > 0) { ?>
                                <?php while($row = mysqli_fetch_assoc($result)) { ?>
                                  <option value="<?php echo $row['id']; ?>"><?php echo $row['username']; ?></option>
			                                  <?php } ?>		
                                                <?php } ?>
                      </select>
	                 </div>		
					  <div class="input-group" id="sub_category_div">
		                <p><i>Service/Product:</i></p>
                          <script type="text/javascript" language="JavaScript">
                              document.write('<select name="service" id="service"><option value="<?php echo $service; ?>">--Please select Company--</option></select>')
                          </script>
                                  <noscript>
                                        <select name="subcategory" id="subcategory">
                                             <option value="">--Please select Company--</option>
                                          </select>
                                       </noscript>
                                     </div>
                          <div class="input-group" id="sub_category_branch">
			                <p><i>Branch/Department:</i></p>
			                   <script type="text/javascript" language="JavaScript">
			                        document.write('<select name="branch" id="branch"><option value="<?php echo $branch; ?>">--Please select Company--</option></select>')
                               </script>
			                    <noscript>
                                 <select name="subcategory_branch" id="subcategory_branch">
                               <option value="">--Please select Company--</option>
                       </select>
                     </noscript>
		            </div>
					<script language="javascript" type="text/javascript">
                                 var rowFrameworkResultInJs =<?php echo json_encode($rowFrameworkResult);?>;
			                     var rowBranchResultInJs =<?php echo json_encode($rowBranchResult);?>;
                                 function dynamicdropdown(listindex)
                                 {
                                     document.getElementById("service").length = 0;
                                     document.getElementById("service").options[0]=new Option("Please select Company","");
				
				                     document.getElementById("branch").length = 0;
                                     document.getElementById("branch").options[0]=new Option("Please select Company","");
				
                                if (listindex) {
                                     var lookup = {};
                                     var j = 1;
                                     for (var i = 0, len = rowFrameworkResultInJs.length; i < len; i++) {
                                     if (rowFrameworkResultInJs[i].user_id == listindex) {
                                     document.getElementById("service").options[j]=new Option(rowFrameworkResultInJs[i].service_name,rowFrameworkResultInJs[i].id);
                                      j = j+1;
                                    }
                                }           
					
					            for(var i=0,len = rowBranchResultInJs.length;i < len; i++) {
						        if(rowBranchResultInJs[i].user_id == listindex) {
						       	document.getElementById("branch").options[j]=new Option(rowBranchResultInJs[i].title,rowBranchResultInJs[i].id);
							    j = j+1;
						                    }
					                   }
                                    }
                
                                       return true;
                                    }
                     </script>
					        <div class="input-group">
			                   <p><i>Category:</i></p>
			                      <select size="1" name="category" value="<?php echo $category; ?>">
			                      <option>Complement</option>
			                      <option>Suggestion</option>
			                      <option>Complaint</option>
			                  </select>
		                   </div>
		
		                   <div class="input-group">
			                  <p><i>Username:Leave blank for anonymity!</i></p>
			                     <input type="text" name="client" value="<?php echo $client; ?>">
		                    </div>
		                    <div class="input-group">
			                   <p><i>Rating Value:</i></p>
			                  <!-- <input type="number" min="1" max="5"name="rate" value="<?php //echo $rate; ?>"> -->
							  <p>EXCELLENT:perfect,no problems</p>
							  <img src="images/img5.png" alt=""/>
						      <input type="radio" name="rate" value="5">
							  <p>GOOD:Minor problems,hardly noticed them</p>
							  <img src="images/img4.png" alt=""/>
						      <input type="radio" name="rate" value="4">
							  <p>FAIR:Had some problems,that affects the service/product</p>
							  <img src="images/img3.png" alt=""/>
						      <input type="radio" name="rate" value="3">
							  <p>POOR:Had several problems,really affected the service/product</p>
							  <img src="images/img2.png" alt=""/>
						      <input type="radio" name="rate" value="2">
							  <p>VERY BAD:Had serious problems</p>
							  <img src="images/img1.png" alt=""/>
						      <input type="radio" name="rate" value="1">
							</div>
		                    <div  class="input-group">
		                  </div>
		              <div class="input-group">
			              <p class="w3-opacity"><i>Rating Date:</i></p>
			              <input type="date" name="date" value="<?php echo date("Y-m-d"); ?>">
		                  </div>
		             <div class="input-group">
                       <p class="w3-opacity"><i>Comment:</i></p>
                       <textarea name="comment"rows="10" cols="30" value="<?php echo $comment; ?>"></textarea>
                           </div>
						   <div class="input-group">
						      <input type="submit" name="submit_user" value="Submit query" />
							</div>
					    </div>
						</form>
					</section>
					  <!-- Our Team -->
					<section id="team" class="four">
						<div class="container">
							<header>
								<h2>Our Team</h2>
							</header>

							<div class="row">
								<div class="4u 12u$(mobile)">
									<article class="item">
										<a href="#" class="image fit"><img src="images/pic02.jpg" alt="" /></a>
										<header>
										    <h3>C.E.O & FOUNDER</h3>
											<h4>Paul Mboya</h4>
											<p>Paul drives SP's strategic vision and manages investor relations.</p>
										</header>
									</article>
									</div>
									<div class="4u 12u$(mobile)">
									<article class="item">
										<a href="#" class="image fit"><img src="images/pic03.jpg" alt="" /></a>
										<header>
										    <h3>CO-FOUNDER & DATA SPECIALIST</h3>
											<h4>Maxwell Omondi Obongo</h4>
											<p>Maxwel leads the daily operations at SP,including product development.</p>
										</header>
									</article>
									</div>
									<div class="4u 12u$(mobile)">
									<article class="item">
										<a href="#" class="image fit"><img src="images/pic03.jpg" alt="" /></a>
										<header>
										    <h3>LEAD DEVELOPER</h3>
											<h3>Noel Eugene</h3>
											<p>Noel leads the technical and development wing of SP.</p>
										</header>
									</article>
									</div>
								</div>
						</div>
					</section>
					
					 <!-- About us -->
					<section id="about" class="five">
						<div class="container">
							<header>
								<h2>About us</h2>
								<a href="#" class="image fit"><img src="images/pic02.jpg" alt="" /></a>
							</header>
                           <h2>-OUR MOTTO-</h2>
                           <p><i>Your Listener</i></p>
						   <p>IN ADDITION to sustainable social change through promoting better service delivery to our clients,we believe passionately in creating an easier and faster
                            means for clients to provide feedback and interact with their service provider and also help companies improve their service delivery. </p>
							<h2>-OUR MISSION-</h2>
							<p>Businesses and people use data to make more informed decisions. Our goal at SP is to provide a more data and insight approach to every industry.</p>
						</div>
					</section>
					
					<!-- Contact -->
					<section id="contact" class="six">
						<div class="container">

							<header>
								<h2>Contact</h2>
							</header>
                             <h3>GET IN TOUCH WITH US</h3>
                              <p><i>We are ready to lead you into the future of better service delivery.</i></p>
							  <h3>EMAIL</h3>
                                <p><i>Sp@founddocument.com</i></p>
								<h2>TELEPHONE</h2>
                                  <p><i>+254704180939</i></p>
								  <h2>Have any querys?</h2>
                                  <p><i>Please note:all fields are required.</i></p>
							<form method="post" action="contact.php">
							  <?php include('errors.php'); ?>
								<div class="row">
									<div class="6u 12u$(mobile)"><input type="text" name="contact_username" placeholder="Name" value="<?php echo $contact_username; ?>"/></div>
									<div class="6u$ 12u$(mobile)"><input type="text" name="contact_email" placeholder="Email" value="<?php echo $contact_email; ?>"/></div>
									<div class="12u$">
										<textarea name="contact_message" placeholder="Message" value="<?php echo $contact_message; ?>"></textarea>
									</div>
									<div class="12u$">
										<input type="submit"  name="submit_contact" value="Submit query" />
									</div>
								</div>
							</form>

						</div>
					</section>
					
					<!-- service subscription -->
					<section id="bottom" class="seven">
						<div class="container">
							<header>
								<h2>Service Subscription</h2>
							</header>

							<div class="row">
								<div class="4u 12u$(mobile)">
									<article class="item">
										<a href="#" class="image fit"><img src="images/pic02.jpg" alt="" /></a>
										<header>
										    <h3>BASIC</h3>
											<h4>Free,Ads suppoted!</h4>
											<p>Get all of the core SP features with the option to upgrade.</p>
										</header>
									</article>
									</div>
									<div class="4u 12u$(mobile)">
									<article class="item">
										<a href="#" class="image fit"><img src="images/pic03.jpg" alt="" /></a>
										<header>
										    <h3>ADVANCED</h3>
											<h4>10$ per month</h4>
											<p>Get all of the core SP features with the option to upgrade and more.</p>
										</header>
									</article>
									</div>
									<div class="4u 12u$(mobile)">
									<article class="item">
										<a href="#" class="image fit"><img src="images/pic03.jpg" alt="" /></a>
										<header>
										    <h3>PREMIUM</h3>
											<h3>89$ per month</h3>
											<p>Get all of the core SP features with the option to upgrade and much more.</p>
										</header>
									</article>
									</div>
								</div>
						</div>
					</section>
					
	          </div>
             <!-- Footer -->
			<div id="footer">

				<!-- Copyright -->
					<ul class="copyright">
						<li>&copy;infostats incorporation.All rights reserved.</li><li>Design:<a href="http://html5up.net">HTML5 UP</a></li>
					</ul>

			</div>

		    <!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.scrolly.min.js"></script>
			<script src="assets/js/jquery.scrollzer.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="assets/js/main.js"></script>
            <!--<script src="assets/js/jquery-3.3.1.min.js"></script> -->
	</body>
	</html>