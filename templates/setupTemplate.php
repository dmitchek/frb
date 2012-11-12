<?php

require_once './twig/lib/Twig/Autoloader.php';
Twig_Autoloader::register();

$loader = new Twig_Loader_Filesystem('./templates');

// ENABLE FOR PRODUCTION
//$twig = new Twig_Environment($loader, array('cache' => './tmp/cache'));

$twig = new Twig_Environment($loader, array());



$templateFile = trim($_SERVER['SCRIPT_NAME'], '/');
$templateFile = str_replace('.php', '', $templateFile).'.phtml';

$template = $twig->loadTemplate($templateFile);

$params['navLinks'] = array ( array ( 
				'link' => 'home.php',
				'text' => 'Home'),
			      array (
				'link' => 'feed.php',
				'text' => 'Feed'),
			      array (
				'link' => 'submit.php',
				'text' => 'Submit')
			    );

?>
