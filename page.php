<?php

error_reporting(E_ALL);
ini_set('display_errors', '1');

require_once './twig/lib/Twig/Autoloader.php';
Twig_Autoloader::register();

$loader = new Twig_Loader_Filesystem('./templates');
$twig = new Twig_Environment($loader, array(
	'cache' => './tmp/cache'));

$templateFile = '404.phtml';

if(isset($_GET['p']) && strlen($_GET['p']) > 0)
	$templateFile = $_GET['p'].'.phtml';

$template = $twig->loadTemplate($templateFile);


$params['scripts'] = array('//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js',
				 'js/vendor/jquery.ui.widget.js',
		                 'js/jquery.iframe-transport.js',
		                 'js/jquery.fileupload.js',
		                 'http://blueimp.github.com/JavaScript-Load-Image/load-image.min.js',
		                 'http://blueimp.github.com/JavaScript-Canvas-to-Blob/canvas-to-blob.min.js',
		                 'js/jquery.fileupload-fp.js',
		                 'js/fileupload.js',
		                 'js/main.js');

$template->display($params);



include_once('datamodel/common.php');

function buildCategories()
{
	$categories = getCategories();

	foreach($categories as $key => $value)
	{
		echo '<option value="'.$key.'">'.$value.'</option>';
	}
	
}



?>
