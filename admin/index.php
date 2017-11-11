<?php
require __DIR__ . '/../autoload.php';

$urlParts = explode('/', $_SERVER['REQUEST_URI']);
$ctrl = !empty($urlParts[2]) ? ucfirst($urlParts[2]) . 'Controller' :
	'DefaultController';
$action = !empty($urlParts[3]) ? $urlParts[3] : 'index';

$class = '\\App\\Controllers\\admin\\' . $ctrl;

$controller = new $class;
$controller->action($action);
