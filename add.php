<!DOCTYPE html>
<html>
<head>
	<title>Add a Recipe</title>
	<link rel = "stylesheet" href = "style.css"/>
</head>

<body>
	<div>
		<nav id = "navStyle">
			<a href = "index.html">Home</a>
		</nav>
	
		<header id = "addHeader">
			Add a Recipe
		</header>
	</div>
	<div>
		<form id ="formStyle" method="post">
			<div id = "formStyle">Name: <input type="text" id="dataStyle" name="recipeName"></div>
			<div id = "formStyle">Type of Food: <input type="text" id="dataStyle" name="recipeType"></div>
			<div id = "formStyle">Ingredients: <input type="text" id="dataStyle" name="recipeIng"></div>
			<div id = "formStyle">Procedure: <input type="text" id="dataStyle" name="recipeProc"></div>
			
			<input type="submit" id = "submitStyle" name="button" value="Submit"/>
		
		</form>
	</div>

<?php

	$connect = mysql_connect("localhost","novak","EF6Qy7SA");
	//$connect = mysql_connect("localhost","root");
	
	if (!$connect)
		{
			die("Could not connect: " . mysql_error());
		}
	mysql_select_db("novakdb",$connect);
	

	if ( isset($_POST["button"]))
	{
		if($_POST["button"] == "Submit" && isset($_POST['recipeName'], $_POST['recipeType'], $_POST['recipeIng'],  $_POST['recipeProc']))
		{
			$insert = "INSERT INTO recipe (name, type, ingedients, recipe)
			VALUES('$_POST[recipeName]','$_POST[recipeType]','$_POST[recipeIng]','$_POST[recipeProc]')";
			mysql_query($insert) or die(mysql_error());
			
			echo"Recipe added";
			
			$recipeFile = "recipe.csv";
			$phpOpen = fopen($recipeFile, 'a') or die("Can't open file");
			$stringData = "$_POST[recipeName]" . "," . "$_POST[recipeType]" . "," . "$_POST[recipeIng]" . "," . "$_POST[recipeProc]" . "\n";
			fwrite($phpOpen, $stringData);
			fclose($phpOpen);
		}
	}
	

	
	
	mysql_close($connect);

?>
	
</body>

