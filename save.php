<?php
session_start();
$con=mysqli_connect("localhost","root","","wsd");
			mysql_set_charset('utf8');
			
			mysql_query('SET character_set_results=utf8');
			mysql_query('SET names=utf8');
			mysql_query('SET character_set_client=utf8');
			mysql_query('SET character_set_connection=utf8');
			mysql_query('SET character_set_results=utf8');
			mysql_query('SET collation_connection=utf8_general_ci');



$i=1;
while(isset($_REQUEST[$i]))
{
	if($_SESSION['log']==1){
	mysqli_query($con,"update data set ann1='".$_REQUEST[$_REQUEST[$i]]."' WHERE id='".$_REQUEST[$i]."';");}
	
	
	if($_SESSION['log']==2){
	mysqli_query($con,"update data set ann2='".$_REQUEST[$_REQUEST[$i]]."' WHERE id='".$_REQUEST[$i]."';");}
	
	if($_SESSION['log']==3){
	mysqli_query($con,"update data set ann3='".$_REQUEST[$_REQUEST[$i]]."' WHERE id='".$_REQUEST[$i]."';");}
	
	
 $i++;	
}



header("Location:index.php?s=save&page=".$_REQUEST['page'].""); 
?>