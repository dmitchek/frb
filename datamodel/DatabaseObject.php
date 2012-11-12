<?php

include_once('/home/dave/var/www/frb/Exceptions.php');
include('/home/dave/var/_connect_info.php');


class DatabaseObject
{
	private $connection;
	protected $table;
	
	function __construct($table = '')
	{
		$this->table = $table;
	}
	
	function connect()
	{
		$this->connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
		if (!$this->connection) {
			die('Could not connect: ' . mysql_error());
		}
	}
	
	function close()
	{
		if($this->connection)
			$this->connection->close();
	}
	
	function query($str)
	{
		$this->connect();
		if($this->connection)
		{
			try {
				$rows = array();
				$result = $this->connection->query($str);
				
				if($result)
				{
					
					if(gettype($result) == 'object')
					{
						while($row = $result->fetch_assoc())
						{
							array_push($rows, $row);
						}
				
						$this->close();
						return $rows;	
					}
					else
						return $result;
				}
				else
				{
					echo "Error: ".$this->connection->get_warnings();
				}
			}
			catch(Exception $e)
			{
				echo "Error Executing Query: ".$e->getMessage();
			}
		}
		else
		{
			//throw new NoDatabaseConnection('No Database Connection');
			echo "No Database Connection!";
		}
		
	}
	
	function containsKeyValuePar($key, $val, $array)
	{
		foreach($array as $entry)
		{
			if($entry[$key] == $val)
				return true;
		}
		
		return false;
	}
	
	function uuid()
	{
		$uuid = $this->query('SELECT UUID() AS id;');		
		return $uuid[0]['id'];
	}
	
	/* Common Gets */
	function getAll()
	{			
		return $this->query('SELECT * FROM '.$this->table.';');
	}
	
	function getById($id)
	{
		return $this->query('SELECT * FROM '.$this->table.' WHERE id = "'.$id.'";');
	}
	
	function getByRecipeId($recipeId)
	{
		return $this->query('SELECT * FROM '.$this->table.' WHERE recipe_id = "'.$recipeId.'";');
	}
	
}

?>