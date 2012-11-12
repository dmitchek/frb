<?php


include_once('datamodel/RecipePhotoData.php');

$recipePhoto = new RecipePhotoData();

switch($_SERVER['REQUEST_METHOD'])
{
	case 'POST':

		$result = $recipePhoto->insertRecipePhoto($_POST['photo_recipe_id'],
		$_POST['photo_path'],
		$_POST['photo_w'],
		$_POST['photo_h']);
		processResult($result);
		break;

}

function processResult($result)
{
	echo 'OK! '.$result;
}

?>