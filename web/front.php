<?php
// framework/web/front.php
require_once __DIR__.'/../vendor/autoload.php';

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

$request = Request::createFromGlobals();

// Test with URL http://framework.local/front.php/hello?name=Eric
$map = array(
	'/hello' => 'hello',
	'/bye' => 'bye',
);

$path = $request->getPathInfo();
if (isset($map[$path])) {
	ob_start();
	extract($request->query->all(), EXTR_SKIP);
	include sprintf(__DIR__.'/../src/pages/%s.php', $map[$path]);
	$response = new Response(ob_get_clean());
} else {
	$response = new Response('Not Found', 404);
}

$response->send();