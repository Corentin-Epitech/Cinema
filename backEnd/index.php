<?php
require '../backEnd/controllers/movieControllers.php';

$controller = new movieControllers();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($_POST['id'] == '') {
        $controller->addMovie();
    } else {
        $controller->updateMovie();
        
    }
} elseif (isset($_GET['id'])) {
    $controller->deleteMovie($_GET['id']);

} else {
    $controller->index();
}


function addRoute($method, $controller) {

