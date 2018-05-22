<?php
// framework/src/app.php
use Symfony\Component\Routing;
use Symfony\Component\HttpFoundation\Response;

function is_leap_year($request) {
    return new Response('False');
}

$routes = new Routing\RouteCollection();

$routes->add('hello', new Routing\Route('/hello/{name}', array(
    'name' => 'World',
    '_controller' => function ($request) {
        return render_template($request);
    },
)));
$routes->add('bye', new Routing\Route('/bye', array(
    '_controller' => function ($request) {
        return render_template($request);
    }
)));
$routes->add('leap_year', new Routing\Route('/is_leap_year/{year}', array(
    'year' => '2018',
    '_controller' => function ($request) {
        return is_leap_year($request);
    }
)));

return $routes;

?>