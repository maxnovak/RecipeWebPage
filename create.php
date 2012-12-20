<?php
	$connect = mysql_connect("localhost","novak", "EF6Qy7SA");
	//$connect = mysql_connect("localhost","root");
	if (!$connect)
	{
		die("Unable to connect: " . mysql_error());
	}		
	if (mysql_select_db("novakdb", $connect));
	{
		$drop = "DROP TABLE recipe";
		mysql_query($drop);
		
		$command = "CREATE TABLE recipe(
			name text,
			type text,
			ingedients text,
			recipe text
			)";
		mysql_query($command);
		//$allTheThings = mysql_fetch_row(mysql_query("SELECT COUNT(*) FROM recipe"));
		//$randomNumber = rand(0,$allTheThings);
		$fill = "LOAD DATA LOCAL INFILE 'recipe.csv' INTO TABLE recipe FIELDS TERMINATED BY ','";
		mysql_query($fill);
		
		$random = "SELECT * FROM recipe ORDER BY rand() LIMIT 1";
		
		$query = mysql_fetch_row(mysql_query($random));
		$str = "<div id='headerText'>Name: </div>" . $query[0] . "<br><div id='headerText'>Type: </div>" . $query[1] . "<br><div id='headerText'>Ingedients: </div>" . $query[2] . "<br><div id='headerText'>Instructions: </div>" . $query[3] . "<br>";

		echo $str;
		
	}
	
	



?>