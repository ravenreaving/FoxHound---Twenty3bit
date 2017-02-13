<!DOCTYPE html>


<?php
session_start();
require "includes/connection.php";

if(isset($_COOKIE['userid']))
{
	$id=$_COOKIE['userid'];	
	header("Location:index.php?userid=$id");
}


if(isset($_POST['btnlogin']))
{
	if(isset($_POST['uname']) && $_POST['pword'])
	{
		$uname=mysql_real_escape_string($_POST['uname']);
		
		$pword=sha1($_POST['pword']);
		$p=mysql_real_escape_string($pword);
		
		$query="select userid from tb_users where uname='$uname' AND pword='$p'";
		$result=mysql_query($query);
		$row=mysql_fetch_assoc($result);
		$id=$row['userid'];
		if(!empty($id))
		{
			if(isset($_POST['keep'])!=NULL)
			{
			setcookie('userid',$id,time()+60*60*24*365);
			}
			else
			{
			setcookie('userid',$id,false);	
			}
		
			header("Location: index.php?userid=$id");
		}
		else
		{	
		echo '<script language="javascript">';
		echo 'alert("Invalid Username/ Password!")';
		echo '</script>';
		
	
		}
		
	}
	
	
}

?>
<html lang="en" class="body-full-height">
    <head>        
        <!-- META SECTION -->
        <title>Fox - Login</title>            
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        
        <link rel="icon" href="favicon.png" type="image/x-icon" />
        <!-- END META SECTION -->
        
        <!-- CSS INCLUDE -->        
        <link rel="stylesheet" type="text/css" id="theme" href="css/theme-default.css"/>
        <!-- EOF CSS INCLUDE -->                                     
    </head>


    <body>
 

	  
		
	
        <div class="login-container">
        
            <div class="login-box animated fadeInDown">
               
				<div class="login-logo"></div>
				
     
                <div class="login-body">
                    <div class="login-title"><strong>Welcome</strong>, Please login</div>
                    <form action="login.php" class="form-horizontal" method="post">
                    <div class="form-group">
                        <div class="col-md-12">
                            <input type="text" class="form-control" name="uname" placeholder="Username" pattern="^[a-zA-Z][a-zA-Z0-9-_\.]{5,13}$" title="Must Contain Alpha Numeric 5-13 characters." required />
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                           <input type="password" class="form-control" name="pword" placeholder="Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase, and at least 8 or more characters"  required/>
                        </div>
                    </div>
                    <div class="form-group">
					 <div class="col-md-6 pull-left">
                         <label for="keep"><input type="checkbox" name="keep"> <font color="#FFFFFF">Keep me logged in</label></font>
                        </div>
                        <div class="col-md-6 pull-right">
                          
							<input type="submit" class="btn btn-info btn-block" value="Log In" name="btnlogin" id="btnlogin"> 
                        </div>
                    </div>
                    </form>
                </div>
                <div class="login-footer">
                    <div class="pull-left">
                        &copy; FoxHound - Twenty3bit
                    </div>
					 <div class="pull-right">
                        Not yet registered? <a href="register.php"><u>Register Here</u></a>
                    </div>
                  
                </div>
            </div>
            
        </div>
        

	
		
    </body>
</html>






