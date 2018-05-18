<?php
// framework/web/front.php
require_once __DIR__.'/../vendor/autoload.php';

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

$request = Request::createFromGlobals();
$response = new Response();

// Test with URL http://framework.local/front.php/hello?name=Eric
$map = array(
	'/hello' => __DIR__.'/../src/pages/hello.php',
	'/bye' => __DIR__.'/../src/pages/bye.php',
);

$path = $request->getPathInfo();
echo $path;
if (isset($map[$path])) {
	ob_start();
	require $map[$path];
	$response->setContent(ob_get_clean());
} else {
	$response->setStatusCode(404);
	$response->setContent('Nothing to see here.');
}

$response->send();