<?php

include_once('DatabaseObject.php');

class User
{
	private $user_id;
	private $user_name;
	private $user_pass;
	private $user_photo;
	private $user_email;
	private $user_notify_on_new_submit;
	private $user_added_on;
	
	public function __construct($id, $name, $pass, $photo, $email, $notify, $added_on)
	{
		$this->user_id = $id;
		$this->user_name = $name;
		$this->user_pass = $pass;
		$this->user_photo = $photo;
		$this->user_email = $email;
		$this->user_notify = $notify;
		$this->user_added_on = $added_on;

	}
	
	public function __set($name, $value)
	{
		$this->$name = $value;
	}
	
	public function __get($name)
	{
		return $this->$name;
	}
	
	public function toJson()
	{
		return json_encode($this->toObject());
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


class UserData extends DatabaseObject
{
	function __construct()
	{
		parent::__construct('users');
	}
	
	/* Gets */
	
	// Returns users added within the specified period $days
	function getByDay($days)
	{
		$queryStr = 'SELECT * FROM'.$this->table.'WHERE (DAY(CURRENT_TIMESTAMP)-DAY($user_added_on)) < '.$days.');';
		
		return $this->query($queryStr);
	}
		
	/* Inserts */
	function insertNewUser($name, $pass, $photo, $email, $notify)
	{
		$queryStr = 'INSERT INTO '.$this->table.' (';
		$user = new User($this->uuid(), $name, $pass, $photo, $email, $notify, NULL);
		$queryStr .= 'user_id, user_name, user_pass, user_photo, user_email, user_notify_on_new_submit, user_added_on) VALUES (';
		
		$queryStr .= "'$user->user_id', ";
		$queryStr .= "'$user->user_name', ";
		$queryStr .= "'$user->user_pass', ";
		$queryStr .= "'$user->user_photo', ";
		$queryStr .= "'$user->user_email', ";
		$queryStr .= "'$user->user_notify_on_new_submit', ";
		$queryStr .= 'CURRENT_TIMESTAMP);';
		
		return $this->query($queryStr);
	}
	
	/* Updates */
	//function updatePassword($pass)
	//example UPDATE pet SET birth = '1989-08-31' WHERE name = 'Bowser';
	
	/* Deletes */
	
}
