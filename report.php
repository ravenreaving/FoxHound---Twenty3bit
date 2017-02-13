<?php
session_start();
require "includes/connection.php";



$testid=$_GET['id'];
$report_url=$_GET['report_url'];
$page_score=$_GET['page_score'];
$yslow_score=$_GET['yslow_score'];
$html_bytes=$_GET['html_bytes'];
$html_loadtime=$_GET['html_loadtime'];
$page_bytes=$_GET['page_bytes'];
$page_load_time=$_GET['page_load_time'];
$now = new DateTime(null, new DateTimeZone('Asia/Manila'));
$datesql=$now->format('Y-m-d H:i:s');
$weburl=$_GET['weburl'];
$webid=$_GET['webid'];
$report_pdf=$_GET['report_pdf'];
$screenshot=$_GET['screenshot'];

if(isset($_SESSION['urlname']))
{
	
$query="insert into tb_webreport(rep_testid,rep_weburl,rep_webid,rep_pageloadtime,rep_pagespeedscore,rep_yslow,rep_lastreport,rep_pdf,rep_screenshot)
VALUES ('$testid','$weburl',$webid,$page_load_time,$page_score,$yslow_score,'$datesql','$report_pdf','$sreenshot')";
$result=mysql_query($query);
if($result)
{

header("Location:gtreporturl.php?webid=$webid & testid=$testid & weburl=$weburl & sqldate=$sqldate");

}
else
{
	echo 'SOMETHING WRONG';
}


}
else
	echo'session not set';









?>


<html>
<body>
<form action="report.php" method="GET">
<input type="submit" name="btntry" id="btntry">
</form>

</body>
</html>




