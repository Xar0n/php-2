<?php
require __DIR__ . '/autoload.php';
$urlParts = explode('/', $_SERVER['REQUEST_URI']);
$ctrl = !empty($urlParts[1]) ? ucfirst($urlParts[1]) . 'Controller' :
	'ArticleController';
$action = !empty($urlParts[2]) ? $urlParts[2] : 'index';

$class = '\\App\\Controllers\\' . $ctrl;

$controller = new $class;
$controller->action($action);
