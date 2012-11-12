<?php

include_once('DatabaseObject.php');
include_once('RecipePhotoData.php');

class Recipe
{
	private $recipe_id;
	private $recipe_title;
	private $recipe_category;
	private $recipe_serves;
	private $recipe_prep_time_min;
	private $recipe_cook_time_min;
	private $recipe_ingredients;
	private $recipe_instructions;
	private $recipe_main_photo;
	private $recipe_posted_by;
	private $recipe_date_submitted;
		
	public function __construct($id, $title, $category, $serves, $prep_time, $cook_time, $ingredients, $instructions, $main_photo, $posted_by, $date_submitted)
	{
		$this->recipe_id = $id;
		$this->recipe_title = $title;
		$this->recipe_category = $category;
		$this->recipe_serves = $serves;
		$this->recipe_prep_time_min = $prep_time;
		$this->recipe_cook_time_min = $cook_time;
		$this->recipe_ingredients = $ingredients;
		$this->recipe_instructions = $instructions;
		$this->recipe_main_photo = $main_photo;
		$this->recipe_posted_by = $posted_by;
		$this->recipe_date_submitted = $date_submitted;
	}
	
	public function __set($name, $value)
	{
		$this->$name = $value;
	}
	
	public function __get($name)
	{
		return $this->$name;
	}
	
	public function toObject()
	{
		$obj = array();
	
		foreach($this as $key => $value)
		{
			$obj[$key] = $value;
		}
	
		return $obj;
	}
}

class RecipeData extends DatabaseObject
{
	function __construct()
	{
		parent::__construct('food_recipes');
	}
	
	/* Gets */
	
	function getByPosterId($id)
	{
		return $this->query('SELECT * FROM '.$this->table.' WHERE recipe_posted_by = "'.$id.'"');
	}
	
	function getByCategory($cat)
	{
		return $this->query('SELECT * FROM '.$this->table.' WHERE recipe_category LIKE "%'.$cat.'%"');
	}
	
	function getByCategories($categories)
	{
		$rows = array();
		
		foreach($categories as $cat)
		{			
			$result = $this->getByCategory($cat);
			
			foreach ($result as $row)
			{
				if(!$this->containsKeyValuePar('id', $row['id'], $rows))
					array_push($rows, $row);
			}
		}
		
		return $rows;
	}
		
	/* Inserts */
	function insertRecipe($title, $category, $serves, $prep_time, $cook_time, $ingredients, $instructions, $main_photo, $posted_by)
	{
		$queryStr = 'INSERT INTO '.$this->table.' (';
		$recipe = new Recipe($this->uuid(), $title, $category, $serves, $prep_time, $cook_time, $ingredients, $instructions, NULL, $posted_by, NULL);
		
		$queryStr .= 'recipe_id, recipe_title, recipe_category, recipe_serves, recipe_prep_time_min, recipe_cook_time_min, recipe_ingredients, recipe_instructions,
					  recipe_main_photo, recipe_posted_by, recipe_date_submitted) VALUES (';
		
		$queryStr .= "'$recipe->recipe_id', ";
		$queryStr .= "'$recipe->recipe_title', ";
		$queryStr .= "'$recipe->recipe_category', ";
		$queryStr .= "'$recipe->recipe_serves', ";
		$queryStr .= "'$recipe->recipe_prep_time_min', ";
		$queryStr .= "'$recipe->recipe_cook_time_min', ";
		$queryStr .= "'$recipe->recipe_ingredients', ";
		$queryStr .= "'$recipe->recipe_instructions', ";
		
		if(strlen($main_photo))
		{
			$recipePhoto = new RecipePhotoData();
			
			$size = getimagesize(urldecode(getcwd().$recipePhoto->getPhotoDir()."/$main_photo"));
			
			if($size)
			{				
				$result = $recipePhoto->insertRecipePhoto($recipe->recipe_id, $main_photo, $size[0], $size[1]);
				
				if($result)
					$recipe->recipe_main_photo = $result;
				else
					$recipe->recipe_main_photo = '';
				
			}

		}
		
		$queryStr .= "'$recipe->recipe_main_photo', ";
		$queryStr .= "'$recipe->recipe_posted_by', ";
		$queryStr .= 'CURRENT_TIMESTAMP);';
		
		return $this->query($queryStr);

	}
	
	/* Updates */
	
	/* Deletes */

	
}

?>