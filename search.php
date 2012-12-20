<?php
	$connect = mysql_connect("localhost","novak","EF6Qy7SA");
	//$connect = mysql_connect("localhost","root");

	if (!$connect)
		{
			die("Could not connect: " . mysql_error());
		}
	mysql_select_db("novakdb",$connect);	
	
	if (isset($_GET["searchTerm"]))
	{
		$find = "SELECT * FROM recipe WHERE name = '$_GET[searchTerm]'";
		$answer = mysql_query($find) or die(mysql_error());
		
		if(mysql_num_rows($answer) == 0)
		{
			echo "No match";
		}
		
		else
		{
			$answer = mysql_fetch_row($answer);
			$str = "<div id='headerText'>Name: </div>" . $answer[0] . "<br><div id='headerText'>Type: </div>" . $answer[1] . "<br><div id='headerText'>Ingedients: </div>" . $answer[2] . "<br><div id='headerText'>Instructions: </div>" . $answer[3] . "<br>";

			echo $str;
		}
		
	}
	mysql_close($connect);
?>