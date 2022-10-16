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
	<title>SP SYSTEM DASHBOARD</title>
	
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
	<script src="../js/fusioncharts.js"></script>
	
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
			            <input type ="text" name="name" placeholder=<?php echo $_SESSION['username']; ?> />
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
						<li><a href="../index.php?logout='1'"style="color: red;" id="login-link" class="skel-layers-ignoreHref"><span class="icon fa-logout">Logout</span></a></li>
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
				<li><a href="#moreTables"><em class="fa fa-columns"></em>More Tables</a></li>
			</ul>
		</div>
		<section id="main-content" class="column column-offset-20">
			<div class="row grid-responsive">
				<div class="column page-heading">
					<div class="large-card">
						<h1> <?php echo $_SESSION['username']; ?> Dashboard</h1>
						<p class="text-large">Registered branches and services.</p>
						<p>You could also add more services and branches.<em>(that will be rated)</em></p>
						<a href="addition.php"class="button">Add Services and Branches</a>
						<a href="deletion.php"class="button">Delete Services and Branches</a>
					</div>
				</div>
			</div>
			<?php include ("../charts/fusioncharts.php")?>
			<?php  
			
			    ///////////////////////////////////////Query FOR BRANCH RATINGS///////////////////////////////////////////////////////////////////////
              
			   $username_id = $_SESSION['username'];
	           $query_id = "SELECT id FROM users WHERE username ='$username_id'";
			   $result = mysqli_query($dbconnection,$query_id);
			   $row_id = mysqli_fetch_array($result);
			   $wd = $row_id['id'];
			  
	           $query_branch = mysqli_query($dbconnection,"SELECT AVG(rating_value)AS total,branch FROM rating WHERE username='$wd' GROUP BY branch") or die (mysqli_error($dbconnection));
	            
			   if($query_branch){$arrData = array(
	           "chart" => array(
	           "caption" => "Branch ratings by percentage",
	           "xAxisName" => "branch",
	           "showvalues" => "1",
	           "showpercentvalues" => "1",
	           "showborder" => "0",
	           "showlegend" => "1",
	           "enablesmartlabels" => "1",
	           "bgcolor" => "FFFFFF",
	           "showplotborder" => "0",
	           "legendposition" => "bottom",
	           "legendbgcolor" => "#CCCCCC",
	           "legendbgalpha" => "20",
	           "legendborderalpha" => "0",
	           "legendnumcolumns" => "3",
	           "palettecolors" => "#f8bd19,#e44a00,#008ee4,#33bdda,#6baa01,#583e78"
	           )
	           );
	           $arrData["data"] = array();
			   
			    
	           while($row = mysqli_fetch_array($query_branch)){
		 
		       array_push($arrData["data"],array(
		       "label" => $row["branch"],
		       "value" => $row["total"]
		       ));
	           }
	           $jsonData = json_encode($arrData);
	           }
	           $columnChart = new FusionCharts("pie3d","BranchRatingChart",
	           "100%","300","graph chart","json",$jsonData);
	 
	           $columnChart -> render();
			   
			  //////////////////////////////////////////Query FOR SERVICE RATINGS///////////////////////////////////////////////////////////////////////
              
	          
	           $query_service = mysqli_query($dbconnection,"SELECT AVG(rating_value)AS total,service FROM rating WHERE username='$wd' GROUP BY service") or die (mysqli_error($dbconnection));
	           
			    if($query_service){$arrData = array(
	           "chart" => array(
	           "caption" => "Service ratings by percentage",
	           "xAxisName" => "branch",
	           "showvalues" => "1",
	           "showpercentvalues" => "1",
	           "showborder" => "0",
	           "showlegend" => "1",
	           "enablesmartlabels" => "1",
	           "bgcolor" => "FFFFFF",
	           "showplotborder" => "0",
	           "legendposition" => "bottom",
	           "legendbgcolor" => "#CCCCCC",
	           "legendbgalpha" => "20",
	           "legendborderalpha" => "0",
	           "legendnumcolumns" => "3",
	           "palettecolors" => "#f8bd19,#e44a00,#008ee4,#33bdda,#6baa01,#583e78"
	           )
	           );
	           $arrData["data"] = array();
			   
			    
	           while($row_service = mysqli_fetch_array($query_service)){
		 
		       array_push($arrData["data"],array(
		       "label" => $row_service["service"],
		       "value" => $row_service["total"]
		       ));
	           }
	           $jsonData = json_encode($arrData);
	           }
	           $pieChart = new FusionCharts("pie3d","ServiceRatingChart",
	           "100%","300","chart graph","json",$jsonData);
	 
	           $pieChart -> render();
			   
			   
			   ///////////////////////////////////////////////////BRANCH COMPLEMENTS//////////////////////////////////////////////////////////////////////////
			     
	          
	           $query_branch_complements = mysqli_query($dbconnection,"SELECT branch,count(*) AS total FROM rating WHERE username='$wd' AND category='Complement' GROUP BY branch") or die (mysqli_error($dbconnection));
	           
			   if($query_branch_complements){$arrData = array(
	           "chart" => array(
	           "caption" => "Branch complements by percentage",
	           "xAxisName" => "branch",
	           "showvalues" => "1",
	           "showpercentvalues" => "1",
	           "showborder" => "0",
	           "showlegend" => "1",
	           "enablesmartlabels" => "1",
	           "bgcolor" => "FFFFFF",
	           "showplotborder" => "0",
	           "legendposition" => "bottom",
	           "legendbgcolor" => "#CCCCCC",
	           "legendbgalpha" => "20",
	           "legendborderalpha" => "0",
	           "legendnumcolumns" => "3",
	           "palettecolors" => "#f8bd19,#e44a00,#008ee4,#33bdda,#6baa01,#583e78"
	           )
	           );
	           $arrData["data"] = array();
			   
			     
	           while($row_branch_complements = mysqli_fetch_array($query_branch_complements)){
		 
		       array_push($arrData["data"],array(
		       "label" => $row_branch_complements["branch"],
		       "value" => $row_branch_complements["total"]
		       ));
	           }
	           $jsonData = json_encode($arrData);
	           }
	           $columnChart2 = new FusionCharts("column3d","BranchComplementChart",
	           "100%","300","chart","json",$jsonData);
	 
	           $columnChart2 -> render();
			   
			   ///////////////////////////////////////////////BRANCH Complaints//////////////////////////////////////////////////////////
			   
	           $query_branch_complaint = mysqli_query($dbconnection,"SELECT branch,count(*) AS total FROM rating WHERE username='$wd' AND category='Complaint' GROUP BY branch") or die (mysqli_error($dbconnection));
	           
			   if($query_branch_complements){$arrData = array(
	           "chart" => array(
	           "caption" => "Branch complaint by percentage",
	           "xAxisName" => "branch",
	           "showvalues" => "1",
	           "showpercentvalues" => "1",
	           "showborder" => "0",
	           "showlegend" => "1",
	           "enablesmartlabels" => "1",
	           "bgcolor" => "FFFFFF",
	           "showplotborder" => "0",
	           "legendposition" => "bottom",
	           "legendbgcolor" => "#CCCCCC",
	           "legendbgalpha" => "20",
	           "legendborderalpha" => "0",
	           "legendnumcolumns" => "3",
	           "palettecolors" => "#f8bd19,#e44a00,#008ee4,#33bdda,#6baa01,#583e78"
	           )
	           );
	           $arrData["data"] = array();
			   
			     
	           while($row_branch_complaint = mysqli_fetch_array($query_branch_complaint)){
		 
		       array_push($arrData["data"],array(
		       "label" => $row_branch_complaint["branch"],
		       "value" => $row_branch_complaint["total"]
		       ));
	           }
	           $jsonData = json_encode($arrData);
	           }
	           $columnChart3 = new FusionCharts("column3d","BranchComplaintChart",
	           "100%","300","chart-2","json",$jsonData);
	 
	           $columnChart3 -> render();
			   
			   ////////////////////////////////////////////////////////BRANCH SUGGESTION///////////////////////////////////////////////////////////////
			   
			    $query_branch_suggestion = mysqli_query($dbconnection,"SELECT branch,count(*) AS total FROM rating WHERE username='$wd' AND category='Suggestion' GROUP BY branch") or die (mysqli_error($dbconnection));
	           
			   if($query_branch_suggestion){$arrData = array(
	           "chart" => array(
	           "caption" => "Branch suggestion by percentage",
	           "xAxisName" => "branch",
	           "showvalues" => "1",
	           "showpercentvalues" => "1",
	           "showborder" => "0",
	           "showlegend" => "1",
	           "enablesmartlabels" => "1",
	           "bgcolor" => "FFFFFF",
	           "showplotborder" => "0",
	           "legendposition" => "bottom",
	           "legendbgcolor" => "#CCCCCC",
	           "legendbgalpha" => "20",
	           "legendborderalpha" => "0",
	           "legendnumcolumns" => "3",
	           "palettecolors" => "#f8bd19,#e44a00,#008ee4,#33bdda,#6baa01,#583e78"
	           )
	           );
	           $arrData["data"] = array();
			   
			     
	           while($row_branch_suggetion = mysqli_fetch_array($query_branch_suggestion)){
		 
		       array_push($arrData["data"],array(
		       "label" => $row_branch_suggetion["branch"],
		       "value" => $row_branch_suggetion["total"]
		       ));
	           }
	           $jsonData = json_encode($arrData);
	           }
	           $columnChart4 = new FusionCharts("column3d","BranchSuggestionChart",
	           "100%","300","chart-3","json",$jsonData);
	 
	           $columnChart4 -> render();
			   
			?>
			<!--Charts-->
			<h5>Charts</h5><a class="anchor" name="charts"></a>
			<div class="row grid-responsive">
				<div class="column column-50">
					<div class="card">
						<div class="card-title">
							<h2>Branch ratings</h2>
						</div>
						<div class="card-block">
							<div class="canvas-wrapper" id="graph chart">
								<canvas class="chart" id="line-chart" height="auto" width="auto"></canvas>
							</div>
						</div>
					</div>
				</div>
				<div class="column column-50">
					<div class="card">
						<div class="card-title">
							<h2>Service ratings</h2>
						</div>
						<div class="card-block">
							<div class="canvas-wrapper" id="chart graph">
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
							<h2>Branch:Complements</h2>
						</div>
						<div class="card-block">
							<div class="canvas-wrapper" id="chart">
								<canvas class="chart" id="pie-chart" height="auto" width="auto"></canvas>
							</div>
						</div>
					</div>
				</div>
				<div class="column column-33">
					<div class="card">
						<div class="card-title">
							<h2>Branch:Complaints</h2>
						</div>
						<div class="card-block">
							<div class="canvas-wrapper" id="chart-2">
								<canvas class="chart" id="radar-chart" height="auto" width="auto"></canvas>
							</div>
						</div>
					</div>
				</div>
				<div class="column column-33">
					<div class="card">
						<div class="card-title">
							<h2>Branch:Suggestion</h2>
						</div>
						<div class="card-block">
							<div class="canvas-wrapper" id="chart-3">
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
							<h2 class="float-left">Notifications:Pending</h2>
							
							<?php 
							
								   $username =  $_SESSION['username'];
	                               $user_id = "";
								   
								   $query_id = "SELECT ID FROM users WHERE username='$username'";
			                       $result = mysqli_query($dbconnection,$query_id);
			
			                       if(mysqli_num_rows($result)>0){$row_id = mysqli_fetch_assoc($result); $user_id = $row_id['ID'];}
							
								   // Query for the company with pending queries.
								   $query_user = mysqli_query($dbconnection,"SELECT client,service,comment FROM rating WHERE username='$user_id' AND category !='Complement' AND query_status='No'")or die (mysqli_error($dbconnection));
								   if(mysqli_num_rows($query_user)>0){$row_user = mysqli_fetch_assoc($query_user);}
								  
								  // $username_id = $row_user['username'];
	                              // $query_id = "SELECT username FROM users WHERE id='$username_id'";
			                     //  $result = mysqli_query($dbconnection,$query_id);
			
			                     //  if(mysqli_num_rows($result)>0){$row = mysqli_fetch_assoc($result);}

								 
								  // Query for getting total number of notifications.
			                        $query_not = mysqli_query($dbconnection,"SELECT query_status,count(*) as number FROM rating WHERE username='$user_id' AND category != 'Complement' AND query_status='No'") or die (mysqli_error($dbconnection));
								  
								  if(mysqli_num_rows($query_not)>0){$row_not = mysqli_fetch_assoc($query_not);}
								  
								  // Query for the company with answered queries.
								   $query_user_1 = mysqli_query($dbconnection,"SELECT client,service,comment FROM rating WHERE username='$user_id' AND category !='Complement' AND query_status='No'")or die (mysqli_error($dbconnection));
								    
							?>
					
							<div class="badge background-primary float-right"><?php echo $row_not['number'];?></div>
							<div class="clearfix"></div>
						</div>
						<?php while($row_row = mysqli_fetch_array($query_user_1)): ?>
						<div class="card-block">
							<div class="mt-1">
								<img src="http://via.placeholder.com/45x45" alt="profile photo" class="circle float-left profile-photo" width="45" height="auto">
								<div class="float-left ml-1">
									<p class="m-0"><strong><a href="index.php"> <?php  echo $row_row['client'];?></a></strong> <span class="text-muted"><?php echo $row_row['comment'];?></span></p>
									<p class="text-small text-muted"><?php echo $row_row['service'];?></p>
								</div>
								<div class="clearfix"></div>
								<hr class="m-0 mb-2" />
							</div>
						</div>
						<?php  endwhile ;?>
					</div>
				</div>
				<div class="column">
					<div class="card">
						<div class="card-title">
							<h2 class="float-left">Notifications:Clients Info</h2>
								
							<?php 
							
								  
								 $username =  $_SESSION['username'];
								 $query_id = "SELECT id FROM users WHERE username='$username'";
			                     $result = mysqli_query($dbconnection,$query_id);
								 $row = mysqli_fetch_array($result);
			                     $username_id = $row['id'];
								 
	                             //query to avoid errors if user data cannot be retreived.
								 $query_user = mysqli_query($dbconnection,"SELECT * FROM rating WHERE username='$username_id' AND category !='Complement' AND query_status='No'")or die (mysqli_error($dbconnection));
								  
								 if(mysqli_num_rows($query_user)>0){
									
								 // Query for the client info with pending queries.
								 $query_client = mysqli_query($dbconnection,"SELECT DISTINCT client FROM rating WHERE username='4' AND category !='Complement' AND query_status='No'")or die (mysqli_error($dbconnection));
								 if(mysqli_num_rows($query_client)>0){$row_client = mysqli_fetch_assoc($query_client);}
								  
								 $username_client = $row_client['client'];
							?>
					
							<div class="badge float-right"><?php  echo $username_client;?> queries</div>
							<div class="clearfix"></div>
                           
							<?php while($row_5 = mysqli_fetch_array($result)): ?>
						    <div class="card-block">
							<div class="mt-1">
								<img src="http://via.placeholder.com/45x45" alt="profile photo" class="circle float-left profile-photo" width="45" height="auto">
								<div class="float-left ml-1">
									<p class="m-0"><strong><?php  echo $row['id'];  echo $row['id'];?></strong> <span class="text-muted"><?php echo $row['id'];?></span></p>
									<p class="text-small text-muted"><strong><?php echo $username_id;?></strong><span class="text-muted"><?php echo $row['id'];?></span></p>
								</div>
								<div class="clearfix"></div>
								<hr class="m-0 mb-2" />
							</div>
						</div>
						<?php  endwhile ; } else { echo 'It appears client is anonymous or there are no queries to your company account.';} ?>
						</div>
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
 
	                               // receive company name from search widget
	                               $username =  $_SESSION['username'];
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
									   \n"; }
                            
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
							<h3>Current Company Services</h3>
						</div>
						<div class="card-block">
							<table>
								<thead>
									<tr>
										<th>Branch Id</th>
										<th>Service</th>
									</tr>
								</thead>
								<?php
                                    $username = $_SESSION['username'];
	                                $query = mysqli_query($dbconnection,"SELECT * FROM services WHERE username='$username'") or die (mysqli_error($dbconnection));
	                                while($row = mysqli_fetch_array($query)){
		                            echo 
		                            "<tr>
		                             <td>{$row['branchID']}</td>
		                             <td>{$row['service_name']}</td>
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
							<h3>Current Company Branches</h3>
						</div>
						<div class="card-block">
							<table>
								<thead>
									<tr>
										<th>Department</th>
										<th>Description</th>
									</tr>
								</thead>
								<?php
                                   $username = $_SESSION['username'];
	                               $query = mysqli_query($dbconnection,"SELECT * FROM branches WHERE username='$username'") or die (mysqli_error($dbconnection));
	                               while($row = mysqli_fetch_array($query)){
		                           echo 
		                           "<tr>
		                           <td>{$row['title']}</td>
		                           <td>{$row['description']}</td>
		                           </tr>\n
		                           ";
	                               }
	                            ?>
							</table>
						</div>
					</div>
				</div>
			</div>
			
			<p><li>DESIGN:<a href="www.medialoot.com">MEDIALOOT</a></li></p>
		</div>
		</section>			
</body>
</html>