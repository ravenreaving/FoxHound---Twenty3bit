<?php
session_start();
require "includes/connection.php";

$webid=$_GET['webid']; // get webid 

$query="select * from tb_websites where webid=$webid"; // search the website via webid in database
$result=mysql_query($query);
$row=mysql_fetch_assoc($result);

$weburl =$row['weburl']; // get the url
$location =$row['web_loc']; // get the location set by the user eg. Sydney Australia
$browser =$row['web_browser']; // get the browser set by the user eg. Chrome / Firefox		

require 'vendor/autoload.php';
use Entrecore\GTMetrixClient\GTMetrixClient;
use Entrecore\GTMetrixClient\GTMetrixTest;

$client = new GTMetrixClient();
$client->setUsername('example@gmail.com'); // set email/username in gtmetrix REQUIRED
$client->setAPIKey('API KEY'); // set api key in gtmetrix REQUIRED

$client->getLocations();
$client->getBrowsers();
$test = $client->startTest($weburl,$location,$browser); // this is where you set the data you get from the database. url , location , browser

//Wait for result
while ($test->getState() != GTMetrixTest::STATE_COMPLETED &&
    $test->getState() != GTMetrixTest::STATE_ERROR) {
    $client->getTestStatus($test);
 
}

// when status is completed get results.

$id=$test->getId();
$report_url=$test->getReportUrl();
$page_score=$test->getPagespeedScore();
$yslow_score=$test->getYslowScore();
$html_bytes=$test->getHtmlBytes();
$html_loadtime=$test->getHtmlLoadTime();
$page_bytes=$test->getPageBytes();
$page_load_time=$test->getPageLoadTime();

$resources=$test->getResources();
$screenshot=$resources["screenshot"]; // array error here
$report_pdf=resources["report_pdf"]; // array error here

$_SESSION['urlname']=$weburl;

header("Location: report.php?id=$id & report_url=$report_url & page_score=$page_score & yslow_score=$yslow_score & html_bytes=$html_bytes & html_loadtime=$html_loadtime & page_bytes=$page_bytes & page_load_time=$page_load_time & report_pdf=$report_pdf & weburl=$weburl & screenshot=$screenshot & webid=$webid");



//echo implode(",",$resources);

/*foreach ($resources as $key_name => $key_value) {

print  $key_name . " Value: " . $key_value . "<BR>";
}*/




//list($r1,$r2,$r3,$r4,$r5,$r6,$r7)=$resources;
/*
echo $r1 ;
echo '<br>';
echo $r2 ;
echo '<br>';
echo $r3 ;
echo '<br>';
echo $r4 ;
echo '<br>';
echo $r5 ;
echo '<br>';
echo $r6 ;
*/

?>


 <!--
<html>
<head>
 <link rel="stylesheet" type="text/css" id="theme" href="theme-default.css"/>
</head>
<body>

/* Listing all the variables
list($drink, $color, $power) = $info;
echo "$drink is $color and $power makes it special.\n";
*/
/*

	*/


	     <div id="preload_container">
        <div id="preloader">
            <span></span>
            <span></span>
            <span></span>
            <span></span>
        </div></div>
   
		
				

		

</body>
</html> -->