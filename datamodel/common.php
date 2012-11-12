<?php

include_once('CategoryData.php');
include_once('UserData.php');

function getCategories()
{
	$catData = new CategoryData();
	$categories = array();
	
	$result = $catData->getAll();
	
	foreach($result as $cat)
	{
		$categories[$cat['cat_id']] = $cat['cat_name'];
	}
	
	return $categories;
	
}


?>