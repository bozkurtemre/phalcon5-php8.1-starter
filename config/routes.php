<?php

declare(strict_types=1);

use Phalcon\Mvc\Router;

$router = new Router();

$router->removeExtraSlashes(true);

$router->add('/:controller', [
    'controller' => 1
]);

$router->add('/:controller/:action', [
    'controller' => 1,
    'action' => 2
]);

$router->add('/:controller/:action/:params', [
    'controller' => 1,
    'action' => 2,
    'params' => 3
]);

return $router;
