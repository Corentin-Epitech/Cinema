<?php
require '../backEnd/controllers/movieControllers.php';

$controller = new movieControllers();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($_GET['id'] !== '') {
        $controller->updateMovie();
    } else {
        $controller->addMovie();
    }
} elseif (isset($_GET['id'])) {
    $controller->deleteMovie($_GET['id']);

} else {
    $controller->index();
}

?>
