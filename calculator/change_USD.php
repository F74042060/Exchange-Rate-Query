<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />	
	<title>Search Data</title>	
</head>
<body>

	<form  id="form1" method="get" align="center" action="http://localhost/Project/calculator/change_USD.php">
		<p><h1><font size="5pt" color="gray" style="font-family:Microsoft JhengHei;">From</font></h1></p>
		<input type="radio" name="from" value="NT" checked="true"><label><font size="4pt" color="gray" style="font-family:Microsoft JhengHei;">NT</font></label>
		<input type="radio" name="from" value="USD"><label><font size="4pt" color="gray" style="font-family:Microsoft JhengHei;">USD</font></label>

		<p><h1><font size="5pt" color="gray" style="font-family:Microsoft JhengHei;">To</font></h1></p>
		<input type="radio" name="to" value="NT"><label><font size="4pt" color="gray" style="font-family:Microsoft JhengHei;">NT</font></label>
		<input type="radio" name="to" value="USD" checked="true"><label><font size="4pt" color="gray" style="font-family:Microsoft JhengHei;">USD</font></label>		

		<p>
			<input type=number name="money"><br>	
		</p>
		<p>					
			<input type=submit value="Convert">	
		</p>
	</form>
<?php
error_reporting(0);
$dbhost = '140.116.245.148';//'localhost';
$dbuser = 'f74042060';//'root';
$dbpass = 'NckuCsie108';//'';
$db 	= 'f74042060';//'mydatabase';
$from 	= $_GET["from"];
$to 	= $_GET["to"];
$money  = $_GET["money"];

//connect to database test;
$link = mysqli_connect($dbhost, $dbuser, $dbpass,$db);	//connect to database
if ($link->connect_error) {
	die("Connection failed: " . $link->connect_error);
} 

if($from == "NT"){	

	if($to == "NT"){	//from NT to NT
		echo "<center><h2><font color=gray size='5pt' style='font-family:Microsoft JhengHei;'>NT: ". $money. "<br> ";
	}
	else if($to == "USD"){	//from NT to USD
		$search = $_GET['money'];
		$sql= " SELECT Currency,Sell FROM `exchange_rate`";	
		$query = mysqli_query($link,$sql);

		while($row=mysqli_fetch_array($query,MYSQLI_ASSOC))
		{	
			$value = $money/$row["Sell"];
			if($row['Currency'] == $to){
				echo "<center><h2><font color=gray size='5pt' style='font-family:Microsoft JhengHei;'>USD: ". $value . "<br> ";
			}
		}
	}
	//search whole table

}else if($from =="USD"){

	if($to == "NT"){	//from USD to NT	
		$search = $_GET['money'];
		$sql= " SELECT Currency,Buy FROM `exchange_rate`";	
		$query = mysqli_query($link,$sql);

		while($row=mysqli_fetch_array($query,MYSQLI_ASSOC))
		{	
			$value = $row["Buy"]*$money;
			if($row['Currency'] == $from){
				echo "<center><h2><font color=gray size='5pt' style='font-family:Microsoft JhengHei;'>NT: ". $value . "<br> ";
			}
		}
	}else if($to == "USD"){	//from USD to USD
		echo "<center><h2><font color=gray size='5pt' style='font-family:Microsoft JhengHei;'>USD: ". $money. "<br> ";
	}
}

$link->close();
?>
		
</body>
</html>