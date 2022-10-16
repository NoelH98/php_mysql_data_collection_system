<?php include ('../configs.php')?>

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
<!DOCTYPE html>
<html lang="en">
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
	<div class="row">
		<div id="sidebar" class="column">
			<h5>Navigation</h5>
			<ul>
				<li><a href="#"><em class="fa fa-home"></em> Home</a></li>
				<li><a href="#charts"><em class="fa fa-bar-chart"></em> Charts</a></li>
				<li><a href="#widgets"><em class="fa fa fa-clone"></em> Widgets</a></li>
				<li><a href="#tables"><em class="fa fa-table"></em> Tables</a></li>
				<li><a href="#moreTables"><em class="fa fa-columns"></em> More Tables</a></li>
				<li><a href="#accounts"><em class="fa fa-clipboard"></em> Accounts</a></li>
			</ul>
		</div>
		<section id="main-content" class="column column-offset-20">
			<div class="row grid-responsive">
				<div class="column page-heading">
					<div class="large-card">
						<h1 class="column column-30 col-site-title">Dashboard</h1>
						<p class="text-large">Welcome to the SP SYSTEM SUPERUSER dashboard.</p>
						<p>You can view sp system analytics here. <em>(only for superuser eyes only)</em></p>
					</div>
				</div>
			</div>
			
			<!--Charts-->
			<h5>Charts</h5><a class="anchor" name="charts"></a>
			<div class="row grid-responsive">
				<div class="column column-50">
					<div class="card">
						<div class="card-title">
							<h2>Line Chart</h2>
						</div>
						<div class="card-block">
							<div class="canvas-wrapper">
								<canvas class="chart" id="line-chart" height="auto" width="auto"></canvas>
							</div>
						</div>
					</div>
				</div>
				<div class="column column-50">
					<div class="card">
						<div class="card-title">
							<h2>Bar Chart</h2>
						</div>
						<div class="card-block">
							<div class="canvas-wrapper">
								<canvas class="chart" id="bar-chart" height="auto" width="auto"></canvas>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row grid-responsive">
				<div class="column column-33">
					<div class="card">
						<div class="card-title">
							<h2>Pie Chart</h2>
						</div>
						<div class="card-block">
							<div class="canvas-wrapper">
								<canvas class="chart" id="pie-chart" height="auto" width="auto"></canvas>
							</div>
						</div>
					</div>
				</div>
				<div class="column column-33">
					<div class="card">
						<div class="card-title">
							<h2>Radar Chart</h2>
						</div>
						<div class="card-block">
							<div class="canvas-wrapper">
								<canvas class="chart" id="radar-chart" height="auto" width="auto"></canvas>
							</div>
						</div>
					</div>
				</div>
				<div class="column column-33">
					<div class="card">
						<div class="card-title">
							<h2>Polar Chart</h2>
						</div>
						<div class="card-block">
							<div class="canvas-wrapper">
								<canvas class="chart" id="polar-area-chart" height="auto" width="auto"></canvas>
							</div>
						</div>
					</div>
				</div>
			</div>
			
			<!--Widgets-->
			<h5 class="mt-2">Widgets</h5><a class="anchor" name="widgets"></a>
			<div class="row grid-responsive mt-1">
				<div class="column">
					<div class="card">
						<div class="card-title">
							<h2 class="float-left">Notifications:pending</h2>
							
							<?php 
			                       // Query for getting total number of notifications.
			                       $query_not = mysqli_query($dbconnection,"SELECT username,count(*) as number FROM contacts") or die (mysqli_error($dbconnection));
								   if(mysqli_num_rows($query_not)>0){$row_user = mysqli_fetch_assoc($query_not);}
								  
								   if(mysqli_num_rows($query_not)>0){
								  
								  // Query for the company with pending queries.
								   $query_user_1 = mysqli_query($dbconnection,"SELECT * FROM contacts")or die (mysqli_error($dbconnection));
								    
							 ?>
			                <div class="badge background-primary float-right"><?php echo $row_user['number'];?></div>
							<div class="clearfix"></div>
						</div>
						<?php while($row_row = mysqli_fetch_array($query_user_1)): ?>
						<div class="card-block">
							<div class="mt-1">
								<img src="http://via.placeholder.com/45x45" alt="profile photo" class="circle float-left profile-photo" width="45" height="auto">
								<div class="float-left ml-1">
									<p class="m-0"><strong><?php echo $row_row['username'];?></strong> <span class="text-muted"><?php echo $row_row['email'];?></span></p>
									<p class="text-small text-muted"><?php echo $row_row['message'];?></p>
								</div>
								<div class="clearfix"></div>
								<hr class="m-0 mb-2" />
							</div>
						</div>
						<?php endwhile;  } else { echo 'It appears there are no queries that have been raised.';} ?>
					</div>
				</div>
				<div class="column">
					<div class="card">
						<div class="card-title">
							<h2 class="float-left">Notifications</h2>
								
							<?php 
					             // Query for getting total number of notifications answered.
			                       $query_not = mysqli_query($dbconnection,"SELECT username,count(*) as number FROM contacts") or die (mysqli_error($dbconnection));
								   if(mysqli_num_rows($query_not)>0){$row_user = mysqli_fetch_assoc($query_not);}
								  
								   if(mysqli_num_rows($query_not)>0){
								  
								  // Query for the answered queries.
								   $query_user_2 = mysqli_query($dbconnection,"SELECT * FROM contacts")or die (mysqli_error($dbconnection));
								    
							?>
							<div class="badge float-right"> <?php echo $row_user['number'];?> Answered</div>
							<div class="clearfix"></div>
						</div>
					    <?php while($row_row = mysqli_fetch_array($query_user_2)): ?>
						<div class="card-block">
						   <div class="mt-1">
								<img src="http://via.placeholder.com/45x45" alt="profile photo" class="circle float-left profile-photo" width="45" height="auto">
								<div class="float-left ml-1">
									<p class="m-0"><strong><?php  echo $row_row['username'];?></a></strong> <span class="text-muted"><?php echo $row_row['email'];?></span></p>
									<p class="text-small text-muted"><strong><?php  echo $row_row['message'];?></strong></p>
								</div>
								<div class="clearfix"></div>
							</div>
						</div>
						<?php endwhile; } else { echo 'It appears there are no queries answered.';} ?>
					</div>
				</div>
			</div>
			
            <!--Tables-->
			<h5 class="mt-2">Tables</h5><a class="anchor" name="tables"></a>
			<div class="row grid-responsive">
				<div class="column ">
					<div class="card">
						<div class="card-title">
							<h3>Current Company Ratings</h3>
						</div>
						<div class="card-block">
							<table>
								<thead>
									<tr>
										<th>Branch</th>
										<th>Service</th>
										<th>Rating</th>
										<th>Company Avg rating</th>
									</tr>
								</thead>
								<?php
 
	                               if (isset($_POST['submit'])) {
	                               // receive company name from search widget
	                               $username = mysqli_real_escape_string($dbconnection, $_POST['name']);
	                               $user_id = "";
								   
								   $query_id = "SELECT ID FROM users WHERE username='$username'";
			                       $result = mysqli_query($dbconnection,$query_id);
			
			                       if(mysqli_num_rows($result)>0){$row_id = mysqli_fetch_assoc($result); $user_id = $row_id['ID'];}
								   
								   			
                                   $query = mysqli_query($dbconnection,"SELECT DISTINCT service,branch FROM rating WHERE username='$user_id'") or die (mysqli_error($dbconnection));
	
	                               while($row = mysqli_fetch_array($query)){
		
	                               $service = $row['service'];
	
	                               $query_sum = mysqli_query($dbconnection,"SELECT AVG(rating_value)AS total FROM rating WHERE username='$user_id' AND service='$service'") or die (mysqli_error($dbconnect));
                                   $row_sum = mysqli_fetch_array($query_sum);
	
	
	                               $query_avg = mysqli_query($dbconnection,"SELECT AVG(rating_value)AS total_avg FROM rating WHERE username='$user_id'") or die (mysqli_error($dbconnect));
	                               $row_avg = mysqli_fetch_array($query_avg);
	
		                            echo 
		                              "<tbody>
									   <tr>
		                               <td>{$row['branch']}</td>
		                               <td>{$row['service']}</td>
		                               <td>{$row_sum['total']}</td>
		                               <td>{$row_avg['total_avg']}</td>
		                               </tr>
									   </tbody>
									   \n"; }}
                            
	                            ?>
							</table>
						</div>
					</div>
				</div>
			</div>
			
			  <!-- More Tables-->
			<h5 class="mt-2">More Tables</h5><a class="anchor" name="moreTables"></a>
			<div class="row grid-responsive">
				<div class="column ">
					<div class="card">
						<div class="card-title">
							<h3>Clients Registered</h3>
						</div>
						<div class="card-block">
							<table>
								<thead>
									<tr>
										<th class="w3-opacity">Username</th>
		                                <th class="w3-opacity">Email</th>
		                                <th class="w3-opacity">First name</th>
		                                <th class="w3-opacity">Last name</th>
									</tr>
								</thead>
								<?php
                
	                                $query = mysqli_query($dbconnection,"SELECT * FROM clients") or die (mysqli_error($dbconnection));
	                                while($row = mysqli_fetch_array($query)){
		                            echo 
		                            "<tr>
		                             <td>{$row['Username']}</td>
		                             <td>{$row['Email']}</td>
		                             <td>{$row['first_name']}</td>
		                             <td>{$row['last_name']}</td>
		                             </tr>\n
		                                ";
	                                }
	                            ?>
							</table>
						</div>
					</div>
				</div>
				<div class="column ">
					<div class="card">
						<div class="card-title">
							<h3>Company Registered</h3>
						</div>
						<div class="card-block">
							<table>
								<thead>
									<tr>
										<th>Company name</th>
										<th>Physical Address</th>
										<th>Sector</th>
									</tr>
								</thead>
								<?php
								
	                               $query = mysqli_query($dbconnection,"SELECT * FROM users") or die (mysqli_error($dbconnection));
	                               while($row = mysqli_fetch_array($query)){
		                           echo 
		                           "<tr>
		                           <td>{$row['username']}</td>
		                           <td>{$row['address']}</td>
		                           <td>{$row['sector']}</td>
		                           </tr>\n
		                           ";
	                               }
	                            ?>
							</table>
						</div>
					</div>
				</div>
			</div>
			  <!-- Permissions-->
			<h5 class="mt-2">Accounts</h5><a class="anchor" name="accounts"></a>
			<div class="row grid-responsive">
				<div class="column page-heading">
					<div class="large-card">
						<h1 class="column column-30 col-site-title">Accounts</h1>
						<p class="text-large">Manage sp accounts.</p>
						<p>You can add or remove and update accounts. <em>(only when necessary)</em></p>
						<a href="clientUpdate.php"class="button">Update client info</a>
						<a href="companyUpdate.php"class="button">Update Company info</a>
						<a href="interface.php"class="button">Delete accounts</a>
						<a href="systemInfo.php"class="button">Run Query(Search)</a>
					</div>
				</div>
			</div>
			<p><li>DESIGN:<a href="www.medialoot.com">MEDIALOOT</a></li></p>
		</div>	 
		</section>
</body>
</html>