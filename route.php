<?php

$router->get('/backEnd/', 'movieControllers@index');
$router->post('/backEnd/add', 'movieControllers@addMovie');
$router->get('/backEnd/delete', 'movieControllers@deleteMovie');
$router->post('/backEnd/update','movieControllers@updateMovie');
?>