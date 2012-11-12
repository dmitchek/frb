<?php

include_once('DatabaseObject.php');

define('PHOTO_DIR', '/server/php/files');
define('THUMBNAIL_DIR', '/server/php/thumbnails');

class RecipePhoto
{
	private $photo_id;
	private $photo_recipe_id;
	private $photo_path;
	private $photo_w;
	private $photo_h;
		
	public function __construct($id, $recipe_id, $path, $w, $h)
	{
		$this->photo_id = $id;
		$this->photo_recipe_id = $recipe_id;
		$this->photo_path = $path;
		$this->photo_w = $w;
		$this->photo_h = $h;
	}
	
	public function __set($name, $value)
	{
		$this->$name = $value;
	}
	
	public function __get($name)
	{
		return $this->$name;
	}
}

class RecipePhotoData extends DatabaseObject
{
	function __construct()
	{
		parent::__construct('food_recipe_photos');
	}
	
	/* Gets */

	
	/* Inserts */
	function insertRecipePhoto($recipe_id, $path, $w, $h)
	{
		$recipePhoto = new RecipePhoto($this->uuid(), $recipe_id, $path, $w, $h);
		
		$queryStr = 'INSERT INTO '.$this->table.' (';
		
		$queryStr .= 'photo_id, photo_recipe_id, photo_path, photo_w, photo_h) VALUES (';
		
		$queryStr .= "'$recipePhoto->photo_id', ";
		$queryStr .= "'$recipePhoto->photo_recipe_id', ";
		$queryStr .= "'$recipePhoto->photo_path', ";
		$queryStr .= "$recipePhoto->photo_w, ";
		$queryStr .= "$recipePhoto->photo_h); ";

		if($this->query($queryStr))
			return $recipePhoto->photo_id;
		else
			return -1;
	}
	
	static function getPhotoDir()
	{
		return PHOTO_DIR;
	}
	
	static function getThumbnailDir()
	{
		return THUMBNAIL_DIR;
	}
	
	/* Update */
	
	/* Delete */
}
	
?>