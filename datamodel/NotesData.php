<?php

include_once('DatabaseObject.php');

class Note 
{
	private $note_id;
	private $note_recipe_id;
	private $note_posted_by;
	private $note_text;
	private $note_posted_on;

	public function __construct($id, $recipe_id, $posted_by, $text, $posted_on)
	{
		$this->note_id = $id;
		$this->note_recipe_id = $id;
		$this->note_posted_by = $posted_by;
		$this->note_text = $text;
		$this->note_posted_on = $posted_on;
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

class NotesData extends DatabaseObject
{
	function __construct()
	{
		parent::__construct('food_recipe_notes');
	}
	
	/* Gets */
	
	
	
	
	/* Inserts */
	
	/* Updates */
	
	/* Deletes */
	
	
}