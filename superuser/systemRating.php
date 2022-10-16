<?php include('../configs.php') ?>

<?php
     session_start();
     if (!isset($_SESSION['username'])) {
		$_SESSION['msg'] = "You must log in first";
		header('location: ../accounts.php');
	}

	if (isset($_GET['logout'])) {
		session_destroy();
		unset($_SESSION['username']);
		header("location: ../index.php");
	}
   
?>
<!DOCTYPE HTML>

<html>
	<head>
		<meta charset="utf-8">
	<title>SP SYSTEM SUPERUSER DASHBOARD</title>
	
	<!-- Google Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700" rel="stylesheet">
	
	<!-- Template Styles -->
	<link rel="stylesheet" href="../css/font-awesome.min.css">
	
	<!-- CSS Reset -->
	<link rel="stylesheet" href="../css/normalize.css">
	
	<!-- Milligram CSS minified -->
	<link rel="stylesheet" href="../css/milligram.min.css">
	
	<!-- Main Styles -->
	<link rel="stylesheet" href="../css/styles.css">
	
	<!--[if lt IE 9]>
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	</head>
	<body>
	<div class="navbar">
		<div class="row">
			<div class="column column-30 col-site-title"><a href="#" class="site-title float-left">Dashboard</a></div>
			     <div class="column column-60 col-search"><a href="#" class="search-btn"></a>
			          <form action="" method="POST"> 
			            <input type ="text" name="name" placeholder="Super user..."/>
						<div class="column column-30">
						<div class="search-btn">
			            <input type ="submit" name="submit"/>
						</div>
		              </form>
					  </div>
			     </div>
			<div class="column column-30">
				<div class="user-section"><a href="#">
					<div class="username">
					    <?php  if (isset($_SESSION['username'])) : ?>
						<h4><strong><?php echo $_SESSION['username']; ?></strong></h4>
						<li><a href="index.php?logout='1'"style="color: red;" id="login-link" class="skel-layers-ignoreHref"><span class="icon fa-logout">Logout</span></a></li>
						<?php endif ?>
					</div>
				</a></div>
			</div>
		</div>
	</div>
	
	 <!--Tables-->
			<h5 class="mt-2">Tables</h5><a class="anchor" name="tables"></a>
			<div class="row grid-responsive">
				<div class="column ">
					<div class="card">
						<div class="card-title">
							<h3>Client Information</h3>
						</div>
						<div class="card-block">
							<table>
								<thead>
									<tr>
										 <th>Company name</th>
		                                 <th>Service</th>
		                                 <th>Category</th>
                                         <th>Comment</th>
		                                 <th>Client</th>
		                                 <th>Rating</th>
		                                 <th>Date</th>
	                                   	 <th>Query Status</th>
									</tr>
								</thead>
								<?php
 
                                  $query = mysqli_query($dbconnection,"SELECT * FROM rating") or die (mysqli_error($dbconnect));
			
	                               while($row = mysqli_fetch_array($query)){
	                               $user_id = $row['username'];
	                               $query_id = "SELECT * FROM users WHERE id='$user_id'";
                                   $result = mysqli_query($dbconnection,$query_id);
		                           while($row_username = mysqli_fetch_array($result)){
		                           echo 
		                           "<tr>
		                            <td>{$row_username['username']}</td>
		                            <td>{$row['service']}</td>
		                            <td>{$row['category']}</td>
		                            <td>{$row['branch']}</td>
		                            <td>{$row['comment']}</td>
		                            <td>{$row['client']}</td>
		                            <td>{$row['rating_value']}</td>
		                            <td>{$row['rating_date']}</td>
		                            <td>{$row['query_status']}</td>
		 
		                            </tr>\n
		                             ";
		                            }
                                     }

                            
	                            ?>
							</table>
						</div>
					</div>
				</div>
			</div>
			
	
	</body>
	</html>