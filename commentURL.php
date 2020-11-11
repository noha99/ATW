<?php

//bringing in the req and res objs
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

require 'vendor/autoload.php';
require 'connection.php';

//every slim app every route is given these 2 objs as arrguments to the call back routine
//create route for a get req
$app = new \Slim\App;
$app->get('/hello/{name}', function (Request $request, Response $response, array $args) {
    $name = $args['name'];
    $response->getBody()->write("Hello, $name");

    return $response;
});


//comment route
require 'comments.php';

$app->run();
