<?php include ('configs.php')?>

<?php
     session_start();
     if (!isset($_SESSION['username'])) {
		$_SESSION['msg'] = "You must log in first";
		header('location: accounts.php');
	}

	if (isset($_GET['logout'])) {
		session_destroy();
		unset($_SESSION['username']);
		header("location: index.php");
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
	<link rel="stylesheet" href="css/font-awesome.min.css">
	
	<!-- CSS Reset -->
	<link rel="stylesheet" href="css/normalize.css">
	
	<!-- Milligram CSS minified -->
	<link rel="stylesheet" href="css/milligram.min.css">
	
	<!-- Main Styles -->
	<link rel="stylesheet" href="css/styles.css">
	<script src="js/fusioncharts.js"></script>
	
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
			            <input type ="text" name="name" placeholder="Company search..."/>
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
			</ul>
		</div>
		<section id="main-content" class="column column-offset-20">
			<div class="row grid-responsive">
				<div class="column page-heading">
					<div class="large-card">
						<h1 class="column column-30 col-site-title">Dashboard</h1>
						<p class="text-large">Welcome to the SP SYSTEM dashboard for clients.</p>
						<p>You can view analytics here. <em>(By searching for a company)</em></p>
					</div>
				</div>
			</div>
	<?php include ("charts/fusioncharts.php")?>
	<?php
		
    ////////////////////////////////////////QUERY FOR EMPLOYMENT STATUS\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\

	$query = mysqli_query($dbconnection,"SELECT gender, count(*) as number FROM clients WHERE employment_status='Yes' GROUP BY gender") or die (mysqli_error($dbconnection));
	
	$query_un = mysqli_query($dbconnection,"SELECT gender, count(*) as number FROM clients WHERE employment_status='No' GROUP BY gender") or die (mysqli_error($dbconnection));
	
	if($query){$arrData = array(
	 "chart" => array(
	 "caption" => "Clients employment",
	 "labeldisplay" => "auto",
	 "useelipseswhenoverflow" => "1",
	 "xaxisName" => "gender",
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
	 
	 while($row = mysqli_fetch_array($query)){
		 
		 $row_unemployed = mysqli_fetch_array($query_un);
		 
		 array_push($arrData["data"],array(
		 "label" => $row["gender"],
		 "value" => $row["number"]
		 ),array(
		 "label" => $row_unemployed["gender"],
		 "value" => $row_unemployed["number"]
		 ));
	 }
	   $jsonData = json_encode($arrData);
	 }
	 $pieChart = new FusionCharts("pie3d","employmentChart",
	 "100%","300","graph chart","json",$jsonData);
	 
	 $pieChart -> render();
	//////////////////////////////////////////////////////////////BAR GRAPH OF GENDER AND MARITAL STATUS////////////////////////////////////////////////////////////////////
	
	
	$query_gender = mysqli_query($dbconnection,"SELECT gender, count(*) as number FROM clients WHERE marital_status='No' GROUP BY gender")or die (mysqli_error($dbconnection));
	
	$query_gender_un = mysqli_query($dbconnection,"SELECT gender, count(*) as number FROM clients WHERE marital_status='Yes' GROUP BY gender")or die (mysqli_error($dbconnection));
	
	if($query_gender){$arrData = array(
	 "chart" => array(
	 "labelDisplay" => "Auto",
	 "useEllipsesWhenOverflow" => "0",
	 "caption" => "Clients marital status",
	 "xAxisName" => "gender",
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
	 "legendnumcolumns" => "4",
	 "palettecolors" => "#f8bd19,#e44a00,#008ee4,#33bdda,#6baa01,#583e78",
	 "theme" => "fint"
	 )
	 );
	 $arrData["data"] = array();
	 
	 while($row_gender = mysqli_fetch_array($query_gender)){
		 
		 $row_gender_un = mysqli_fetch_array($query_gender_un);
		 
		 array_push($arrData["data"],array(
		 "label" => $row_gender["gender"],
		 "value" => $row_gender["number"]
		 ),array(
		 "label" => $row_gender_un["gender"],
		 "value" => $row_gender_un["number"]
		 ));
	 }
	   $jsonData = json_encode($arrData);
	 }
	 $columnChart = new FusionCharts("column3d","maritalStatusChart",
	 "100%","300","chart graph","json",$jsonData);
	 
	 $columnChart -> render();
	 
 
	 /////////////////////////////////////////////////////////////////average tt ///////////////////////////////////////////////////////////////////////////////
     
	  $result_tt= "";
	  
	 if (isset($_POST['submit'])) {
      	$username = mysqli_real_escape_string($dbconnection, $_POST['name']);
	    $user_id = "";
	
	        $query_id = "SELECT ID FROM users WHERE username='$username'";
			$result = mysqli_query($dbconnection,$query_id);
			
			if(mysqli_num_rows($result)>0){
				$row_id = mysqli_fetch_assoc($result);
				$user_id = $row_id['ID'];
			}else{
			 	$average_tt = '0';
			}
		

	 $query_tt = "SELECT AVG(DATEDIFF(responce_date,rating_date))AS tt FROM rating WHERE username='$user_id'";
	 $result_tt = mysqli_query($dbconnection,$query_tt);
          
     
	 
	 if($result_tt){$arrData = array(
	 "chart" => array(
	 "caption" => "average tt",
	 "xAxisName" => "Days",
	 )
	 );
	 $arrData["data"] = array();
	 
	 while($row_tt = mysqli_fetch_array($result_tt)){
		 array_push($arrData["data"],array(
		 "label" => $row_tt["tt"],
		 "value" => $row_tt["tt"]
		 ));
	 }
	   $jsonData = json_encode($arrData);
	 }
	 $barChart = new FusionCharts("bar3d","ttChart",
	 "100%","10%","tt","json",$jsonData);
	 
	 $barChart -> render();
	 }
	 /////////////////////////////////////////////////////////CLIENT SATISFACTION AGAINST GENDER ///////////////////////////////////////////////////////////////
	 
	 $query_sat_gender = mysqli_query($dbconnection,"SELECT gender,AVG(rating_value)AS total FROM rating GROUP BY gender") or die (mysqli_error($dbconnection));
	 $row_sat_gender = mysqli_fetch_array($query_sat_gender);
	 
		    
	 if($row_sat_gender){$arrData = array(
	 "chart" => array(
	 "caption" => "client satisfaction",
	 "xAxisName" => "percentage",
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
	 
	 while($row_tt = mysqli_fetch_array($query_sat_gender)){
		 array_push($arrData["data"],array(
		 "label" => $row_tt["gender"],
		 "value" => $row_tt["total"]
		 ));
	 }
	   $jsonData = json_encode($arrData);
	 }
	 $barChart3 = new FusionCharts("column3d","chartaverage",
	 "100%","300","chartaverage2","json",$jsonData);
	 
	 $barChart3 -> render();
	 
	 //////////////////////////////////////////////////////////////WRITING TO TXT FILES///////////////////////////////////////////////////////////////////////
	     
	 //Writing to complements.txt
	  
	 $query_complements = mysqli_query($dbconnection,"SELECT comment FROM rating WHERE category ='Complement'") or die (mysqli_error($dbconnection));
	 while($row_complements = mysqli_fetch_array($query_complements)){
		$myComplements = fopen("r script/text/complements.txt","w") or die ("Unable to open complements file");
		$text = $row_complements['comment'];
		fwrite($myComplements,$text);
		fclose($myComplements);
	 }
	 
	 //Writing to complaints.txt
	 
	 $query_complaints = mysqli_query($dbconnection,"SELECT comment FROM rating WHERE category ='Complaint'") or die (mysqli_error($dbconnection));
	 while($row_complaints = mysqli_fetch_array($query_complaints)){
		$myComplaints = fopen("r script/text/complaints.txt","w") or die ("Unable to open complaints file");
		$text2 = $row_complaints['comment'];
		fwrite($myComplaints,$text2);
		fclose($myComplaints);
	 }
	 
	  //Writing to suggestion.txt
	 
	 $query_suggestion = mysqli_query($dbconnection,"SELECT comment FROM rating WHERE category ='Suggestion'") or die (mysqli_error($dbconnection));
	 while($row_suggestion = mysqli_fetch_array($query_suggestion)){
		$mySuggestion = fopen("r script/text/suggestion.txt","w") or die ("Unable to open complaints file");
		$text3 = $row_suggestion['comment'];
		fwrite($mySuggestion,$text3);
		fclose($mySuggestion);
	 }
	 
	 //Writing to frequently used words.txt
	 
	 $query_freq = mysqli_query($dbconnection,"SELECT comment FROM rating") or die (mysqli_error($dbconnection));
	   while ($row_freq = mysqli_fetch_array($query_freq)){
		$myFreq = fopen("r script/text/freq.txt","w") or die ("Unable to open freq file");
		$text4 = $row_freq['comment'];
		fwrite($myFreq,$text4);
		fclose($myFreq);
	 
	   }
	 
    ?>	
	
	<script type="text/javascript" src="js/fusioncharts.js"></script>
 
			<!--Charts-->
			<h5>Charts</h5><a class="anchor" name="charts"></a>
			<div class="row grid-responsive">
				<div class="column column-50">
					<div class="card">
						<div class="card-title">
							<h2>Client Employment by gender</h2>
						</div>
						<div class="card-block" id="graph chart" style="width:100%;height:100%">
							<div class="canvas-wrapper">
								<canvas class="chart" id="line-chart" height="auto" width="auto"></canvas>
							</div>
						</div>
					</div>
				</div>
				<div class="column column-50">
					<div class="card">
						<div class="card-title">
							<h2>Client gender and marital status</h2>
						</div>
						<div class="card-block" id="chart graph">
							<div class="canvas-wrapper" id="chart2">
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
							<h2>WordCloud:complement</h2>
						</div>
						<div class="card-block">
							<div class="canvas-wrapper">
								<img src="r script/images/cloud_complements.png" alt="complements" width="auto" height="auto">
								<canvas class="chart" id="pie-chart" height="auto" width="auto"></canvas>
							</div>
						</div>
					</div>
				</div>
				<div class="column column-33">
					<div class="card">
						<div class="card-title">
							<h2>WordCloud:suggestion</h2>
						</div>
						<div class="card-block">
							<div class="canvas-wrapper">
							    <img src="r script/images/cloud_complaints.png" alt="suggestion" width="auto" height="auto">
								<canvas class="chart" id="radar-chart" height="auto" width="auto"></canvas>
							</div>
						</div>
					</div>
				</div>
				<div class="column column-33">
					<div class="card">
						<div class="card-title">
							<h2>WordCloud:complaint</h2>
						</div>
						<div class="card-block">
							<div class="canvas-wrapper">
						        <img src="r script/images/cloud_suggestion.png" alt="complaints" width="auto" height="auto">
								<canvas class="chart" id="polar-area-chart" height="auto" width="auto"></canvas>
							</div>
						</div>
					</div>
				</div>
			</div>
			
			<div class="row grid-responsive">
				<div class="column column-33">
					<div class="card">
						<div class="card-title">
							<h2>Sentimental analysis</h2>
						</div>
						<div class="card-block">
							<div class="canvas-wrapper">
							    <img src="r script/cloud.png" alt="sentimentalAnalysis" width="auto" height="auto">
								<canvas class="chart" id="pie-chart" height="auto" width="auto"></canvas>
							</div>
						</div>
					</div>
				</div>
				<div class="column column-33">
					<div class="card">
						<div class="card-title">
							<h2>FrequentlyUsedWords</h2>
						</div>
						<div class="card-block">
							<div class="canvas-wrapper">
							    <img src="r script/images/temp.png" alt="freqUsedWords" width="auto" height="auto">
								<canvas class="chart" id="radar-chart" height="auto" width="auto"></canvas>
							</div>
						</div>
					</div>
				</div>
				<div class="column column-33">
					<div class="card">
						<div class="card-title">
							<h2>Word Themes</h2>
						</div>
						<div class="card-block">
							<div class="canvas-wrapper">
							    <img src="r script/cloud.png" alt=" word themes" width="auto" height="auto">
								<canvas class="chart" id="polar-area-chart" height="auto" width="auto"></canvas>
							</div>
						</div>
					</div>
				</div>
			</div>
	  	
			<div class="row grid-responsive">
				<div class="column column-50">
					<div class="card">
						<div class="card-title">
							<h2>AverageCompany TT in days</h2>
						</div>
						<div class="card-block">
							<div class="canvas-wrapper" id="tt">
								<canvas class="chart" id="line-chart" height="auto" width="auto"></div></canvas>
							</div>
						</div>
					</div>
		  
				<div class="column column-50">
					<div class="card">
						<div class="card-title">
							<h2>Client satisfaction against gender</h2>
						</div>
						<div class="card-block">
							<div class="canvas-wrapper" id="chartaverage2">
								<canvas class="chart" id="bar-chart" height="auto" width="auto"></canvas>
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
			
								   $username =  $_SESSION['username'];
								   
								   //query to  avoid errors if user data  cannot be retreived.
								   $query_user = mysqli_query($dbconnection,"SELECT * FROM clients WHERE Username='$username'")or die (mysqli_error($dbconnection));
								   
	                               if(mysqli_num_rows($query_user)>0){
								   // Query for the company with pending queries.
								   $query_user = mysqli_query($dbconnection,"SELECT username,service,rating_date FROM rating WHERE client='$username' AND category !='Complement' AND query_status='No'")or die (mysqli_error($dbconnection));
								   if(mysqli_num_rows($query_user)>0){$row_user = mysqli_fetch_assoc($query_user);}
								  
								   if(mysqli_num_rows($query_user)>0){
								   $username_id = $row_user['username'];
	                               $query_id = "SELECT username FROM users WHERE id='$username_id'";
			                       $result = mysqli_query($dbconnection,$query_id);
								   
			
			                       if(mysqli_num_rows($result)>0){$row = mysqli_fetch_assoc($result);}

								 
								  // Query for getting total number of notifications.
			                        $query_not = mysqli_query($dbconnection,"SELECT query_status,count(*) as number FROM rating WHERE client='$username' AND category != 'Complement' AND query_status='No'") or die (mysqli_error($dbconnection));
								  
								   if(mysqli_num_rows($query_not)>0){$row_not = mysqli_fetch_assoc($query_not);}
								  
								  // Query for the company with pending queries.
								   $query_user_1 = mysqli_query($dbconnection,"SELECT username,service,rating_date FROM rating WHERE client='$username' AND category !='Complement' AND query_status='No'")or die (mysqli_error($dbconnection));
								    
							 ?>
			                <div class="badge background-primary float-right"><?php echo $row_not['number'];?></div>
							<div class="clearfix"></div>
						</div>
						<?php while($row_row = mysqli_fetch_array($query_user_1)): ?>
						<div class="card-block">
							<div class="mt-1">
								<img src="http://via.placeholder.com/45x45" alt="profile photo" class="circle float-left profile-photo" width="45" height="auto">
								<div class="float-left ml-1">
									<p class="m-0"><strong><?php echo $row['username'];?></strong> <span class="text-muted"><?php echo $row_row['service'];?></span></p>
									<p class="text-small text-muted"><?php echo $row_row['rating_date'];?></p>
								</div>
								<div class="clearfix"></div>
								<hr class="m-0 mb-2" />
							</div>
						</div>
						<?php endwhile;  } else { ?><li></li><?php echo 'It appears there are no queries you have raised.';} ?>
						<?php } else { ?><li><a href="company/interface.php">Company Dashboard</a></li> <?php echo 'It appears you are registered to a company account.'; } ?>
					</div>
				</div>
				<div class="column">
					<div class="card">
						<div class="card-title">
							<h2 class="float-left">Notifications:answered</h2>
								
							<?php 
					
								   $username =  $_SESSION['username'];
	                              
								   //Query to  avoid errors if user data  cannot be retreived.
								   $query_user = mysqli_query($dbconnection,"SELECT * FROM clients WHERE Username='$username'")or die (mysqli_error($dbconnection));
								   
	                               if(mysqli_num_rows($query_user)>0){
									  
								   //Query for the company with answered queries.
								   $query_user = mysqli_query($dbconnection,"SELECT username,service,rating_date FROM rating WHERE client='$username' AND category !='Complement' AND query_status='Yes'")or die (mysqli_error($dbconnection));
								   if(mysqli_num_rows($query_user)>0){$row_user = mysqli_fetch_assoc($query_user);}
								  
								   $username_id = $row_user['username'];
	                               $query_id = "SELECT username FROM users WHERE id='$username_id'";
			                       $result = mysqli_query($dbconnection,$query_id);
			
			                       if(mysqli_num_rows($result)>0){$row = mysqli_fetch_assoc($result);}

								 
								    //Query for getting total number of notifications.
			                        $query_noti = mysqli_query($dbconnection,"SELECT query_status,count(*) as number FROM rating WHERE client='$username' AND category != 'Complement' AND query_status='Yes'") or die (mysqli_error($dbconnection));
								    if(mysqli_num_rows($query_noti)>0){$row_noti = mysqli_fetch_assoc($query_noti);}  
							 
							        //Query for the company with answered queries.
								    $query_user_2 = mysqli_query($dbconnection,"SELECT username,user_comment,service,rating_date FROM rating WHERE client='$username' AND category !='Complement' AND query_status='Yes'")or die (mysqli_error($dbconnection));
								  
							?>
							<div class="badge float-right"> <?php echo $row_noti['number'];?> Answered</div>
							<div class="clearfix"></div>
						</div>
					    <?php while($row_row = mysqli_fetch_array($query_user_2)): ?>
						<div class="card-block">
						   <div class="mt-1">
								<img src="http://via.placeholder.com/45x45" alt="profile photo" class="circle float-left profile-photo" width="45" height="auto">
								<div class="float-left ml-1">
									<p class="m-0"><strong><a href="client/index.php"><?php  echo $row['username'];?></a></strong> <span class="text-muted"><?php echo $row_row['service'];?></span></p>
									<p class="text-small text-muted"><strong><?php  echo $row_row['user_comment'];?></strong> <span class="text-muted"><?php echo $row_row['rating_date'];?></span></p>
								</div>
								<div class="clearfix"></div>
							</div>
						</div>
						<?php endwhile; } else { ?><li><a href="company/interface.php">Company Dashboard</a></li> <?php echo 'It appears you are registered to a company account.'; } ?>
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
			
			<p><li>DESIGN:<a href="www.medialoot.com">MEDIALOOT</a></li></p>
			
								<!-- javascript -->
			<script type="text/javascript" src="js/jquery.min.js"></script>
			<script type="text/javascript" src="js/chart.min.js"></script>
			<!--<script type="text/javascript" src="js/app.js"></script>-->
	        
     
			
</body>
</html>