<?php 
require_once './vendor/autoload.php';


$loader = new Twig_Loader_Filesystem('./templates');
$twig = new Twig_Environment($loader, array());

echo $twig->render('base.html', array('name' => 'Fabien'));


 ?>