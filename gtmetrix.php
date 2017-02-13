<?php

require"includes/connection.php";

// if user select a website and click analyz button
if(isset($_POST['analyze']))
{
if(isset($_POST['webselect']))
{
// get the website id then pass on to gttest.php
$webid=$_POST['webselect'];
header("Location:gttest.php?webid=$webid");
}
else
{
	echo "<script type='text/javascript'>alert('No URL Selected');</script>";
}

}


// if user added a website
if(isset($_POST['btn_addwebsite']))
{
	if(isset($_POST['weburl']) && isset($_POST['loc_id']) && isset($_POST['browser_id']))
	{
		$weburl=$_POST['weburl'];
		$loc_id=$_POST['loc_id'];
		$browser_id=$_POST['browser_id'];
		
		$query="SELECT * from tb_websites where weburl='$weburl'";
		$result=mysql_query($query);
		$row=mysql_fetch_assoc($result);
		$count = mysql_num_rows($result);
		
		if($count==1)
		{
			echo "<script type='text/javascript'>alert('Website Url is Already Added!');</script>";
		}
		else
		{
	
	$query="INSERT INTO tb_websites(weburl,web_loc,web_browser)VALUES('$weburl',$loc_id,$browser_id)";
	$result1=mysql_query($query);
	if($result1)
	{
		echo ("<SCRIPT LANGUAGE='JavaScript'>
        window.alert('Website Successfuly Added!')
        </SCRIPT>");
	}
	else
	{
		echo ("<SCRIPT LANGUAGE='JavaScript'>
        window.alert('Database Error!')
        </SCRIPT>");
	}
	
		}
		
		
	}
	else
	{
		echo "<script type='text/javascript'>alert('1 or more Values not Found!');</script>";
	}
}

?>
<!DOCTYPE html>
<html lang="en">
    <head>        
        <!-- META SECTION -->
        <title>GTMetrix - Dashboard</title>            
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        
        <link rel="icon" href="favicon.png" type="image/x-icon" />
        <!-- END META SECTION -->
        
        <!-- CSS INCLUDE -->        
        <link rel="stylesheet" type="text/css" id="theme" href="css/theme-default.css"/>
        <!-- EOF CSS INCLUDE -->                   
		
		  <!-- GA API SCRIPTS --> 

		
    </head>
    <body>
	
        <!-- START PAGE CONTAINER -->
        <div class="page-container">
            
            <!-- START PAGE SIDEBAR -->
            <div class="page-sidebar">
                <!-- START X-NAVIGATION -->
                <ul class="x-navigation">
                    <li class="xn-logo">
                        <a href="gtmetrix.php">GTMetrix</a>
                        <a href="#" class="x-navigation-control"></a>
                    </li>
                 <li class="xn-profile">
                        <a href="#" class="profile-mini">
                            <img src="assets/images/users/no-image.jpg" alt="Administrator"/>
                        </a>
                        <div class="profile">
                            <div class="profile-image">
                                <img src="assets/images/users/no-image.jpg" alt="Administrator"/>
                            </div>
                            <div class="profile-data">
                                <div class="profile-data-name">Raven Reaving</div>
                                <div class="profile-data-title">Administrator</div>
                            </div>
                          
                        </div>                                                                        
                    </li>
					
				   <li class="xn-title">Manage Account</li>
                  <li class="xn-openable">
                        <a href="#"><span class="fa fa-cogs"></span> <span class="xn-text">Settings</span></a>
                        <ul>
						
                           <li><a href="#"><span class="fa fa-key"></span>Password</a></li>
                        </ul>
                    </li>                  
                   
				   
                    <li class="xn-title">Navigation</li>
                  <li class="xn-openable">
                        <a href="#"><span class="fa fa-dashboard"></span> <span class="xn-text">Dashboards</span></a>
                        <ul>
							<li><a href="gadash.php"><span class="fa fa-area-chart"></span>Google Analytics</a></li>
                           <li><a href="gtmetrix.php"><span class="fa fa-line-chart"></span>GTMetrix</a></li>
                        </ul>
                    </li>                  
                   
                   
              
                    
                </ul>
                <!-- END X-NAVIGATION -->
            </div>
            <!-- END PAGE SIDEBAR -->
            
            <!-- PAGE CONTENT -->
            <div class="page-content">
                
                <!-- START X-NAVIGATION VERTICAL -->
                <ul class="x-navigation x-navigation-horizontal x-navigation-panel">
                    <!-- TOGGLE NAVIGATION -->
                    <li class="xn-icon-button">
                        <a href="#" class="x-navigation-minimize"><span class="fa fa-dedent"></span></a>
                    </li>
                    <!-- END TOGGLE NAVIGATION -->
                    <!-- SEARCH -->
                    <li class="xn-search">
                        <form role="form">
                            <input type="text" name="search" placeholder="Search..."/>
                        </form>
                    </li>   
                    <!-- END SEARCH -->  
					
					
                    <!-- Sign out --> 
                         <li class="pull-right"><a href="#" class="mb-control" data-box="#mb-signout"><span class="fa fa-sign-out"></span> Sign Out</a></li> 
                    
					<!-- End Sign out --> 					
                          
                   
                  
                 
                </ul>
                <!-- END X-NAVIGATION VERTICAL -->                     

                <!-- START BREADCRUMB -->
                <ul class="breadcrumb">
                    <li><a href="gtmetrix.php">GTMetrix</a></li>                    
                    <li class="active">Dashboard</li>
                </ul>
                <!-- END BREADCRUMB -->                       
                <form action="gtmetrix.php" method="POST">
				<!-- modal sample-->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
				<div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                        <h4 class="modal-title">Add Website URL</h4>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="icon-preview"><i class="fa fa-list-alt"></i></div>
                            </div>
                            <div class="col-md-8">
                                <ul class="list-group border-bottom">
                                    <li class="list-group-item icon-preview-span">Website Url:<input type="url" name="weburl" pattern="https?://.+" title="Include http://" class="form-control"></li>
                                    <li class="list-group-item icon-preview-i">
									<select class="form-control" name="loc_id">
									<option value="" disabled selected>Select your server Region...</option>
									<?php
									
	$query="select * from tb_location";
	$result=mysql_query($query);
    $row=mysql_query($result);
	   while($row=mysql_fetch_assoc($result))
	   {
		   
		   echo'<option value="'.$row['loc_id'].'">'.$row['loc_name'].'</option>';
		
		   
	   }
									
									?>
									
									</select></li>
                                   <li class="list-group-item icon-preview-i">
									<select class="form-control" name="browser_id">
									<option value="" disabled selected>Select your browser...</option>
											<?php
									
	$query="select * from tb_browser";
	$result=mysql_query($query);
    $row=mysql_query($result);
	   while($row=mysql_fetch_assoc($result))
	   {
		   
		   echo'<option value="'.$row['browser_id'].'">'.$row['browser_name'].'</option>';
		
		   
	   }
									
									?>
									</select></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
					<input type="submit" class="btn btn-success" value="Save" name="btn_addwebsite">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>                        
                    </div>
                </div>
				
		 </div>
</div>
				<!-- modal sample-->
				
                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">
                    
					
					<div class="row">
				
						<div class="col-md-12">
						<div class="panel-body">
                                    <h3>Analyze Performance of:</h3>
                                    <form class="form-horizontal">
                                        <div class="form-group">
                                            <div class="col-md-6">
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                        <span class="fa fa-location-arrow"></span>
                                                    </div>
													<select class="form-control" name="webselect" id="webselect">
													<option value="" disabled selected>Select website url to Analyze...</option>
													<?php
													
		$query1="select * from tb_websites";
		$result=mysql_query($query1);
		$row1=mysql_query($result);
	   while($row1=mysql_fetch_assoc($result))
	   {
		   
		   echo'<option value="'.$row1['webid'].'">'.$row1['weburl'].'</option>';
		   
	   }
	   
													
							
								?>						
										</select>
                                                                                        
<div class="input-group-btn">
													
<input type="submit" name="analyze" id="analyze" class="btn btn-info" value="Analyze">
                                                     
                                                    </div>
														
													
                                                </div>
                                            </div>
											
										<div class="col-md-4">
												<button type="button" class="btn btn-success btn-block" data-toggle="modal" data-target="#myModal"><span class="fa fa-plus"></span>Add new Website URL</button>
                                              <!--   <button class="btn btn-success btn-block" data-toggle="modal" data-target="#myModal"><span class="fa fa-plus"></span> Add new Website URL</button>-->
                                            </div>
                                         
										 <div class="col-md-2">
										 
										 <button class="btn btn-info btn-block"><span class="fa fa-cogs"></span>Reminders</button>
										 
										 </div>
                                        </div>
                                    </form>                                    
                                </div>
						</div>
					</div>
					
                                 
                    <div class="row">
					
					
					</div>
				
				
		

			<div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-colorful">

                                <div class="panel-heading">
                                    <h3 class="panel-title">Website URLS</h3>
                                </div>

                                <div class="panel-body panel-body-table">

                                    <div class="table-responsive">
                                        <table class="table table-bordered table-striped table-actions">
                                            <thead>
                                                <tr>
                                                    <th width="100">URL</th>
													<!--<th width="60">Option</th>-->
                                                    <th width="60">PageLoad</th>
                                                    <th width="60">PageSpeed</th>
                                                    <th width="60">YSLOW</th>
													<th width="60">Lastreport</th>
                                                   
                                                </tr>
                                            </thead>
                                            <tbody>             

<?php
// list the websites "LAST REPORTS" not yet finalize in updating when test occur
			$query="SELECT webid,weburl,rep_webid,rep_testid,rep_pageloadtime,rep_pagespeedscore,rep_yslow,rep_lastreport FROM tb_websites JOIN tb_webreport ON webid=rep_webid";
			$result=mysql_query($query);
			while($row=mysql_fetch_assoc($result))
				{
echo 

   '<tr>
        <td class="text-left"><a target="_blank" href="gtreporturl?testid='.$row['rep_testid'].'">'.$row['weburl'].'</a></td>
     
		<td> '.$row['rep_pageloadtime'].'</td>
        <td> '.$row['rep_pagespeedscore'].'</td>
        <td> '.$row['rep_yslow'].'</td>
		<td>'.$row['rep_lastreport'].'</td>
        </tr>';
				}
?>											
                                             
												
									
                                             
                                            </tbody>
                                        </table>
                                    </div>                                

                                </div>
                            </div>                                                

                        </div>
                    </div>
					
					
                  </div>
                    
                   
                   
				   
				   
                </div>
                <!-- END PAGE CONTENT WRAPPER -->                                
            </div>            
            <!-- END PAGE CONTENT -->
        </div>
        <!-- END PAGE CONTAINER -->

        <!-- MESSAGE BOX-->
        <div class="message-box animated fadeIn" data-sound="alert" id="mb-signout">
            <div class="mb-container">
                <div class="mb-middle">
                    <div class="mb-title"><span class="fa fa-sign-out"></span> Log <strong>Out</strong> ?</div>
                    <div class="mb-content">
                        <p>Are you sure you want to log out?</p>                    
                        <p>Press No if youwant to continue work. Press Yes to logout current user.</p>
                    </div>
                    <div class="mb-footer">
                        <div class="pull-right">
                            <a href="pages-login.html" class="btn btn-success btn-lg">Yes</a>
                            <button class="btn btn-default btn-lg mb-control-close">No</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END MESSAGE BOX-->

		

	</form>
		
		
        <!-- START PRELOADS -->
        <audio id="audio-alert" src="audio/alert.mp3" preload="auto"></audio>
        <audio id="audio-fail" src="audio/fail.mp3" preload="auto"></audio>
        <!-- END PRELOADS -->                  
        
    <!-- START SCRIPTS -->
        <!-- START PLUGINS -->
        <script type="text/javascript" src="js/plugins/jquery/jquery.min.js"></script>
        <script type="text/javascript" src="js/plugins/jquery/jquery-ui.min.js"></script>
        <script type="text/javascript" src="js/plugins/bootstrap/bootstrap.min.js"></script>        
        <!-- END PLUGINS -->

        <!-- START THIS PAGE PLUGINS-->        
        <script type='text/javascript' src='js/plugins/icheck/icheck.min.js'></script>        
        <script type="text/javascript" src="js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js"></script>
        <script type="text/javascript" src="js/plugins/scrolltotop/scrolltopcontrol.js"></script>
        
        <script type="text/javascript" src="js/plugins/morris/raphael-min.js"></script>
        <script type="text/javascript" src="js/plugins/morris/morris.min.js"></script>       
        <script type="text/javascript" src="js/plugins/rickshaw/d3.v3.js"></script>
        <script type="text/javascript" src="js/plugins/rickshaw/rickshaw.min.js"></script>
        <script type='text/javascript' src='js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js'></script>
        <script type='text/javascript' src='js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js'></script>                
        <script type='text/javascript' src='js/plugins/bootstrap/bootstrap-datepicker.js'></script>                
        <script type="text/javascript" src="js/plugins/owl/owl.carousel.min.js"></script>                 
        
        <script type="text/javascript" src="js/plugins/moment.min.js"></script>
        <script type="text/javascript" src="js/plugins/daterangepicker/daterangepicker.js"></script>
        <!-- END THIS PAGE PLUGINS-->        

        <!-- START TEMPLATE -->
        <script type="text/javascript" src="js/settings.js"></script>
        
        <script type="text/javascript" src="js/plugins.js"></script>        
        <script type="text/javascript" src="js/actions.js"></script>
        
        <script type="text/javascript" src="js/demo_dashboard.js"></script>
        <!-- END TEMPLATE -->
    <!-- END SCRIPTS -->         
    </body>
</html>






