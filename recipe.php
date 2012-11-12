<?php

include_once('datamodel/RecipeData.php');

$recipeData = new RecipeData();

switch($_SERVER['REQUEST_METHOD'])
{
	case 'POST':
		
		$result = $recipeData->insertRecipe($_POST['recipe_title'], 
						    $_POST['recipe_category'],
						    $_POST['recipe_serves'],
						    $_POST['recipe_prep_time_min'],
						    $_POST['recipe_cook_time_min'],
						    $_POST['recipe_ingredients'],
						    $_POST['recipe_instructions'],
						    $_POST['recipe_main_photo'],
						    $_POST['submitted_by']);
		processResult($result);
		break;
		
	case 'GET':
		$pathLength = (isset($_SERVER['PATH_INFO'])) ? strlen($_SERVER['PATH_INFO']) : '';
		
		$offset = (isset($_REQUEST['offset'])) ? $_REQUEST['offset'] : 0;
		$length = (isset($_REQUEST['length'])) ? $_REQUEST['length'] : -1;
		
		if($pathLength > 1)
		{
			$urlParts = explode('/', $_SERVER['PATH_INFO']);
			$recipes = array();
			
			foreach($urlParts as $id)
			{
				if(strlen($id))
				{
					$recipe = $recipeData->getById($id);
					$recipes[] = $recipe[0];
				}
			}
			
			
		}
		else
		{
			$recipes = $recipeData->getAll();
		}		

		echo json_encode(buildRecipeData($recipes, $offset, $length));
		
}

function buildRecipeData($recipes, $offset, $length)
{
	$recipeArray = array();

	$recipeLength = count($recipes);
	
	for($i = $offset; ($i < $length) && ($offset + $i) < $recipeLength; $i++)
	{
		$recipe = $recipes[$i];
		
		$newRecipe = new recipe($recipe['id'],
			$recipe['recipe_title'],
			$recipe['recipe_category'],
			$recipe['recipe_serves'],
			$recipe['recipe_prep_time_min'],
			$recipe['recipe_cook_time_min'],
			$recipe['recipe_ingredients'],
			$recipe['recipe_instructions'],
			$recipe['recipe_main_photo'],
			$recipe['recipe_notes'],
			$recipe['recipe_posted_by'],
			$recipe['recipe_date_submitted']);
				
		$recipeArray[] = $newRecipe->toObject();

	}

	return $recipeArray;

}

function processResult($result)
{
	echo 'OK! '.$result;
}


?>
