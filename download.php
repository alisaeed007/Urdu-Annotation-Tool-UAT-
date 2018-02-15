<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>View</title>
</head>

<body>
<?php

	
				$con=mysqli_connect("localhost","root","","wsd");
				
				//$con=mysqli_connect("db632971009.db.1and1.com","dbo632971009","Azeem123!@#","db632971009");
		
		mysql_set_charset('utf8');
		
		mysql_query('SET character_set_results=utf8');
		mysql_query('SET names=utf8');
		mysql_query('SET character_set_client=utf8');
		mysql_query('SET character_set_connection=utf8');
		mysql_query('SET character_set_results=utf8');
		mysql_query('SET collation_connection=utf8_general_ci');
		$sql = "SELECT * FROM data order by fid";
		$result = mysqli_query($con, $sql);
		echo "<center><h1>Stored Data</h1></center>";

	echo"<table width='700' align='center' border='1'>";
	echo "<tr><td><strong>SentenceID</strong></td><td><strong>WordID</strong></td><td><strong>Sentences</strong></td><td><strong>Ann1</strong></td><td><strong>Ann2</strong></td><td><strong>Ann3</strong></td></tr>";	
	$file = fopen("data.txt","w");
	$tt=1;
	$w=1;
	fwrite($file,"WordID~SentenceID~Sentences~Ann1~Ann2~Ann3\n");
		while($row = mysqli_fetch_assoc($result)){
			if($row['fid']!=$w)
				{
					$tt=1;
					$w++;
				}
			
			?>
			

  <tr>
    <td align="center"><?php echo $row['fid'];?></td>
    <td align="center"><?php echo $tt;?></td>
    <td align="center"><?php echo $row['sen'];?></td>
    <td align="center"><h3><font color="#FF0000"><?php echo $row['ann1'];?></font></h3></td>
    <td align="center"><h3><font color="#FF0000"><?php echo $row['ann2'];?></font></h3></td>
    <td align="center"><h3><font color="#00FF00"> <?php echo $row['ann3'];?></font></h3></td>

  </tr>


<?php




$s=$row['fid']."~".$tt."~".$row['sen']."~".$row['ann1']."~".$row['ann2']."~".$row['ann3']."\n";


//fwrite($file,$s);
$tt++;

?>
	
	
	<?php	}
		echo "</table><a href='index.php'>Back</a></center>";
		
	
	
?>	


</body>
</html>