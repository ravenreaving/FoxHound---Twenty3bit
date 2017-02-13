<?php

$webid=$_GET['webid'];
$weburl=$_GET['weburl'];
$testid=$_GET['testid'];
$sqldate=$_GET['sqldate'];


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
	<form action="gtmetrix.php" method="POST">
        <!-- START PAGE CONTAINER -->
        <div class="page-container">
            
            <!-- START PAGE SIDEBAR -->
            <div class="page-sidebar">
                <!-- START X-NAVIGATION -->
                <ul class="x-navigation">
                    <li class="xn-logo">
                        <a href="gtreporturl.php">GTMetrix</a>
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
							<li><a href="#"><span class="fa fa-area-chart"></span>Google Analytics</a></li>
                           <li><a href="#"><span class="fa fa-line-chart"></span>GTMetrix</a></li>
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
                    <li><a href="gtmetrix.php">GTMetrix Report</a></li>                    
                    <li class="active">Dashboard</li>
                </ul>
                <!-- END BREADCRUMB -->                       
                
                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">
                    
					
					<div class="row">
				
						<div class="col-md-12">
						
						<div class="panel-body">
						<div class="row">
						<div class="col-md-4">
						<img src="https://gtmetrix.com/api/0.1/test/<?php echo $testid;?>/screenshot" alt="HTML5 Icon" class="pull-left" style="width:320px;height:240px;"> </div>
						<div class="col-md-8">
						<h1 class="pull-left">Last Performance Report for:</h1></div>
						<div class="row">
						<div class="col-md-4">
						<strong><h2><?php echo $weburl; ?> Report Generated:<?php echo $sqldate;?></h2></strong></div>
						</div>
						
							
								
									</div>
										<hr>
									<br>
                                    <form class="form-horizontal">
                                        <div class="form-group">
                                            
											<div class="col-md-6">
											
											<a href="https://gtmetrix.com/api/0.1/test/<?php echo $testid;?>/report-pdf" target="_blank"><button type="button" class="btn btn-danger btn-lg">DOWNLOAD PDF</button></a>
											
											</div>
											
										
                                        </div>
                                    </form>                                    
                                </div>
						</div>
					</div>
					
                                 
                    <div class="row">
					
					
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






