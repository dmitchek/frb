<?php

error_reporting(E_ALL);
ini_set('display_errors', '1');

include_once('datamodel/RecipeData.php');

$recipes = new RecipeData();

//$results = $recipes->getById('1b9fc266-b325-11e1-950e-6cf049091f0d');

$results = $recipes->getByCategories(array('1688', '1689', '1688'));

//$results = $recipes->getByCategory('1689');

//$results = $recipes->getAll();

//print_r($result);

echo "Num Items: ".count($results)."<br><br>";

/*
foreach($results as $key => $value)
{
	foreach($value as $name => $val)
	{
		if(gettype($val) == 'array')
			print_r($val);
		else
			echo "$name : $val <br>";
	}
		
	
	echo "<br><br>";
}*/

//if($recipes->insertNewRecipe("My New Title", "1688", 4, 23, 23, "[this]", "[that]", "path", "d9aade16-b32b-11e1-abb0-6cf049091f0d"))
//	echo "success!";

?>