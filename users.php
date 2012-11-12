<?php

include_once('datamodel/UserData.php');

$userData = new UserData();

switch($_SERVER['REQUEST_METHOD'])
{
	case 'GET':
		$urlParts = explode('/', $_SERVER['PATH_INFO']);
		$users = array();
		
		if($urlParts[1] == 'all')
			$users = $userData->getAll();

		echo json_encode(buildUserData($users));
		break;
}


function buildUserData($users)
{
	$userArray = array();

	foreach($users as $user)
	{
		$newUser = new User($user['user_id'],
							$user['user_name'],
							'********',
							$user['user_photo'],
							$user['user_email'],
							$user['user_notify_on_new_submit'],
							$user['user_added_on']);
		

		$userArray[] = $newUser->toObject();
		
	}
		
	return $userArray;
	
}