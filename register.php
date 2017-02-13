<?php
require "includes/connection.php";

if(isset($_POST['btnsave']))
{
if(isset($_POST['fname']) && isset($_POST['lname']) && isset($_POST['uname']) && isset($_POST['pword']) && isset($_POST['repword']))
{
	$fname=$_POST['fname'];
	$lname=$_POST['lname'];
	$uname=$_POST['uname'];
	$pword=$_POST['pword'];
	$repword=$_POST['repword'];
	if($uname) // Check if username is not yet taken.
	{
		$query="SELECT * from tb_users where uname='$uname'";
		$result=mysql_query($query);
		$row=mysql_fetch_assoc($result);
		$count = mysql_num_rows($result);
		
		if($count==1)
		{
			echo "<script type='text/javascript'>alert('Username is Already Taken!');</script>";
		}
	}
	if ($pword!==$repword) // Check if password don't match with re-password
	{
echo ("<SCRIPT LANGUAGE='JavaScript'>
        window.alert('Password does not match!') </SCRIPT>");
	}
	else // if username okay and password okay --> Register user in database
	{
	$pass=sha1($repword);	
	$query="INSERT INTO tb_users(uname,pword,fname,lname)VALUES('$uname','$pass','$fname','$lname')";
	$result1=mysql_query($query);
	if($result1)
	{
		echo ("<SCRIPT LANGUAGE='JavaScript'>
        window.alert('Succesfully Registered!')
        window.location.href='login.php'
        </SCRIPT>");
	}
		
		
	}	
}
}

?>

<html lang="en" class="body-full-height">
    <head>        
        <!-- META SECTION -->
        <title>Fox - Register</title>            
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
        
		  <form action="register.php" method="POST" class="form-horizontal">
        <div class="registration-container">            
            <div class="registration-box animated fadeInDown" id="regform">

                <div class="registration-logo"></div>
                <div class="registration-body">
                    <div class="registration-title"><strong>Registration</strong>, use form below</div>
                    <div class="registration-subtitle">Fill up the details below.</div>
                  
                        
                    <h4>Personal info</h4>
                    <div class="form-group">
                        <div class="col-md-12">
                            <input required type="text"  class="form-control" name="fname" id="fname" placeholder="First Name" pattern="[A-Za-z]{1,15}" title="Firstname should only contain 1-15 letters. Example: John" />
                        </div>
                    </div>
                        <div class="form-group">
                        <div class="col-md-12">
                            <input type="text" required class="form-control"  name="lname" id="lname" placeholder="Surname" pattern="[A-Za-z]{1,15}" title="Lastname should only contain 1-15 letters. Example: Wick"/>
                        </div>
                    </div>
                 
                    <h4>Authentication</h4>                    
                    <div class="form-group">
                        <div class="col-md-12">
                            <input type="text" required class="form-control"  name="uname" pattern="^[a-zA-Z][a-zA-Z0-9-_\.]{5,13}$" title="Must Contain Alpha Numeric 5-13 characters." id="uname" placeholder="Username"/>
                        </div>
                    </div>                        
                    <div class="form-group">
                        <div class="col-md-12">
                            <input type="password" required class="form-control"  pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase, and at least 8 or more characters"  name="pword" id="pword" placeholder="Password"/>
                        </div>
                    </div>                    
                    <div class="form-group">
                        <div class="col-md-12">
                            <input type="password" required class="form-control"   pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase, and at least 8 or more characters" name="repword" id="repword" placeholder="Re-Password"/>
                        </div>
                    </div>             
                    
                    <div class="form-group push-up-30">
                        <div class="col-md-6">
                            <a href="login.php" class="btn btn-link btn-block">Already have account?</a>
                        </div>
                        <div class="col-md-6">
						<input type="submit" class="btn btn-danger btn-block" name="btnsave" id="btnsave" value="Signup">
                          <!--  <button class="btn btn-danger btn-block" name="btnsave" id="btnsave">Sign Up</button> -->
                        </div>
                    </div>
                    </form>
                </div>
                <div class="registration-footer">
                    <div class="pull-left">
                        &copy; 2016 FoxHound - Twenty3bit
                    </div>
                    <div class="pull-right">
                        <a href="#">About</a>
                    </div>
                </div>
            </div>
            
        </div>
        
    </body>
</html>






