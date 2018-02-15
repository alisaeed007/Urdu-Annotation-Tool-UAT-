<?php
session_start();


	$con=mysqli_connect("localhost","root","","wsd");
	//$con=mysqli_connect("db632971009.db.1and1.com","dbo632971009","Azeem123!@#","db632971009");
		
		mysql_set_charset('utf8');
		mysql_query('SET character_set_results=utf8');
		mysql_query('SET names=utf8');
		mysql_query('SET character_set_client=utf8');
		mysql_query('SET character_set_connection=utf8');
		mysql_query('SET character_set_results=utf8');
		mysql_query('SET collation_connection=utf8_general_ci');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Urdu Semanitic Tagger</title>
<script language="javascript">
var y=0;
function click_text(x)
	{
		y=x;
	}
function fun1(u)
{
	document.getElementById(y).value=u;
}
</script>
<style>
body
{
	font-family:"Urdu Naskh Asiatype", Tahoma; unicode-bidi: embed;
}
#menu
{
	position: fixed;
font-family:"Urdu Naskh Asiatype", Tahoma; font-size:30 ; unicode-bidi: embed;

}
.cell
{
	height:60px;
	padding-left:10px;
	border-right: 1px solid #333;
	border-bottom: 1px solid #333;
}
#upper
{
	border-top:1px solid #333;
}

#upper1
{
	border-top:1px solid #333;
	padding:10px;
	font-family:"Urdu Naskh Asiatype", Tahoma; font-size:30 ; unicode-bidi: embed;

}
.cell input
{
	font-weight:bold;
	float:right;
	margin-right:10px;
}
</style>
</head>

<body bgcolor="#999999">

<?php
if(isset($_REQUEST['user']))
{
	if($_REQUEST['user']=="ann1" && $_REQUEST['pass']=="123")
	{
		header("Location:index.php?ann=1");
		$_SESSION['log']=1;
	}
	else if($_REQUEST['user']=="ann2" && $_REQUEST['pass']=="456")
	{
		header("Location:index.php?ann=2");
		$_SESSION['log']=2;
	}
	else if($_REQUEST['user']=="ann3" && $_REQUEST['pass']=="789")
	{
		header("Location:index.php?ann=3");
		$_SESSION['log']=3;
	}
	else echo "<center>wrong Username or Password</center>";
		
}
?>


<?php if(!isset($_SESSION['log'])) {?>
<center>
<form action="index.php">
<table border="0" style="background:#FFFFFF; padding:10px; border-radius:10px;">
  <tr>
    <td colspan="2"><h3>Urdu Semantic Tagger</h3></td>
  </tr>
  <tr>
  <tr>
    <td>User Name</td>
    <td><input name="user" type="text" /></td>
  </tr>
  <tr>
    <td>Password</td>
    <td><input name="pass" type="password" /></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><input type="submit" /></td>
  </tr>
</table>

</form>
</center>
<?php }?>

<?php if(isset($_SESSION['log']))
{
?>
<center>
<table width="100%" border="0">
  <tr>
    <td valign="top">
   <h3>Click Here for&nbsp;<a style="color:#FF0;" href="logout.php">Log Out</a></h3>
   <!-- <h3><a  style="color:#FFFFFF;" href="index.php?ann=1">Annotator1</a><br />
 	<a style="color:#FFFFFF;" href="index.php?ann=2">Annotator2</a></h3>-->
   
    </td>
    <td><center>

<table width="900" border="0"  cellpadding="0" cellspacing="0" style="border:1px solid #333; border-radius:30px;" bgcolor="#FFFFFF">
  <tr>
    <td colspan="2">
    <center>
    <?php if(isset($_REQUEST['s']) ){echo "<font color='#FF0000'>data has been saved successfully!</font>";} ?>
    <h1>
    Urdu Semantic Tagger
    <b>( اردو سمنٹک ٹيگر )</b>
    </h1>
<?php 
if(!isset($_REQUEST['page']))
{
	$p=1;
}
if(isset($_REQUEST['page']))
{
	$p=$_REQUEST['page'];
	if($p>50)$p=50;
	if($p<1)$p=1;
}



$sql = "SELECT * FROM senses where id='".$p."'";
		$result = mysqli_query($con, $sql);
		while($row1 = mysqli_fetch_assoc($result)){ 
?>
    <h3><a href="index.php?page=<?php echo $p-1;?>"><input type="button" value="<"></a> &nbsp; Word Under Consideration: <font color="#FF0000"><?php echo $row1['main']; $word=$row1['main']; ?></font> &nbsp; <a href="index.php?page=<?php echo $p+1;?>"><input type="button" value=">"></a></h3>
   <h3>Word ID:&nbsp;<font color="#FF0000"> <?php echo $row1['id'];?></font></h3>
    </center>
    </td>
    
  </tr>
  <tr>
    <td width="300" valign="top" id="upper" class="cell"> 


    
<div id="menu">    
    <table  width="300" border="1" >
    <tr>
	<td>
    <?php echo $row1['s1']; ?>
    <input type="button" value="Sense 1" onclick="fun1(1)"/>
    </td>
	</tr>
	<tr>
	<td>
    <?php echo $row1['s2']; ?>
    <input type="button" value="Sense 2" onclick="fun1(2)"/>
    </td>
	</tr>
    <?php if($row1['s3']!="-"){?> 
        <tr>
        <td>
        <?php echo $row1['s3']; ?>
        <input type="button" value="Sense 3" onclick="fun1(3)"/>
        </td>
        </tr>
    <?php }?> 
    <?php if($row1['s4']!="-"){?> 
        <tr>
        <td>
        <?php echo $row1['s4']; ?>
        <input type="button" value="Sense 4" onclick="fun1(4)"/>
        </td>
        </tr>
    <?php }?> 
    <?php if($row1['s5']!="-"){?> 
        <tr>
        <td>
        <?php echo $row1['s5']; ?>
        <input type="button" value="Sense 5" onclick="fun1(5)"/>
        </td>
        </tr>
    <?php }?> 
    <?php if($row1['s6']!="-"){?> 
        <tr>
        <td>
        <?php echo $row1['s6']; ?>
        <input type="button" value="Sense 6" onclick="fun1(6)"/>
        </td>
        </tr>
    <?php }?>  
   <?php if($row1['s7']!="-"){?> 
        <tr>
        <td>
        <?php echo $row1['s7']; ?>
        <input type="button" value="Sense 7" onclick="fun1(7)"/>
        </td>
        </tr>
   <?php }?>     
   
    <?php if($row1['s8']!="-"){?>
        <tr>
        <td>
        <?php echo $row1['s8']; ?>
        <input type="button" value="Sense 8" onclick="fun1(8)"/>
        </td>
        </tr>
    <?php }?>
       <tr>
        <td>
        <input type="button" value="Sense not Clear" onclick="fun1(-1)"/>
        </td>
        </tr>
	
	<?php
		}

	


?>
  
</table>
</div>

</td>    
  
    
 
    
    <td  id="upper1" align="right">
 <form action="save.php" method="get" style="min-height:350px;">   
    <?php

	    if($_SESSION['log']!=3)
		$sql = "SELECT * FROM data where fid='".$p."'";
		else
		$sql = "SELECT * FROM data where fid='".$p."' and ann1<>ann2";
		
		
		$result = mysqli_query($con, $sql);
$b=1;				
$tt=1;
while($row = mysqli_fetch_assoc($result)){

if($_SESSION['log']==1){$a=$row['ann1'];}
if($_SESSION['log']==2){$a=$row['ann2'];}
if($_SESSION['log']==3){$a=$row['ann3'];}
?>
<?php
 if($_SESSION['log']==3)
 {
	echo "<b style='padding-right:200px'>Ann1:&nbsp;<font color='#FF0000'>".$row['ann1']."</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
	echo "Ann2:&nbsp;<font color='#FF0000'>".$row['ann2']."</font></b>";
 }
?>
<input type="text" style="width:20px; padding-left:12px;" id="<?php echo $row['id'];?>" name="<?php echo $row['id'];?>" value="<?php echo $a;?>" onfocus="click_text(<?php echo $row['id'];?>)"/>

  <?php 
  echo "<b>Sentence ID:&nbsp;".$tt."</b><br>";$tt++;?>
  <?php //echo $row['sen'];
  $r=explode(" ", $row['sen']);
  
  $count=0;
  while($count<sizeof($r))
  	{
		if($r[$count]==$word)
		echo "<b><font color='#FF0000'>".$r[$count]."</font></b>"." ";
		else
		echo $r[$count]." ";
		
		$count++;
	}
  
  ?>
 
 
 <input type="hidden" name="<?php echo  $b;?>" value="<?php echo $row['id'];?>"/>  
<input type="hidden" name="page" value="<?php echo $p;?>"/>  
   
   <hr>
 
  <br />


<?php
$b++;
		}
    
    ?>
    <a href="download.php" style="margin-right:300px; text-decoration:none"><input type="button" value="View & Download"/> </a> 
 <input type="submit" style="padding:20px; border-radius:5px; font-size:20px" value="Save"/>  
 
</form>    
</td>
  </tr>
  </table>
  
  
<font color="#333333">Powered by: Natural Language Processing Research Lab, COMSATS Institute of IT, Lahore</font>
</center></td>
    <td valign="top"><h3><font color="#FFFF00"> You are workig as <h2><b>Annotator <?php echo $_SESSION['log'];?></b></h2></font></h3></td>
  </tr>
</table>
</center>

<?php } ?>
</body>
</html>
