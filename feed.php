
<?php

include_once('datamodel/common.php');
require_once('templates/setupTemplate.php');

$params['scripts'] = array( 
		'http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js',
		'/js/vendor/jquery.ui.widget.js',
		'/js/jquery.iframe-transport.js',
		'/js/jquery.fileupload.js',
		'http://blueimp.github.com/JavaScript-Load-Image/load-image.min.js',
		'http://blueimp.github.com/JavaScript-Canvas-to-Blob/canvas-to-blob.min.js',
		'/js/jquery.fileupload-fp.js',
		'/js/fileupload.js',
		'/js/jquery.pagination.js',
		'/js/main.js',
		'/js/feed.js');


$params['pageInfo'] = array('title' => 'Recipe Feed');

// Lets see some HTML!
$template->display($params);
?>
