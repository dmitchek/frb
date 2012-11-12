<?php

error_reporting(E_ALL);
ini_set('display_errors', '1');

require_once('templates/setupTemplate.php');
include_once('datamodel/common.php');

$params['scripts'] = array('//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js',
				 'js/vendor/jquery.ui.widget.js',
		                 'js/jquery.iframe-transport.js',
		                 'js/jquery.fileupload.js',
		                 'http://blueimp.github.com/JavaScript-Load-Image/load-image.min.js',
		                 'http://blueimp.github.com/JavaScript-Canvas-to-Blob/canvas-to-blob.min.js',
		                 'js/jquery.fileupload-fp.js',
		                 'js/fileupload.js',
		                 'js/main.js');

$params['pageInfo'] = array('title' => 'Submit A New Recipe');

function buildCategories()
{
	$categories = getCategories();

	foreach($categories as $key => $value)
	{
		echo '<option value="'.$key.'">'.$value.'</option>';
	}
	
}

// Lets see some HTML!
$template->display($params);
?>
