<?php
require_once '../backEnd/models/movieModels.php';

class movieControllers
{
    private $movieModel;

    public function __construct()
    {
        $this->movieModel = new Movies();
    }

    public function index()
    {
        $movies = $this->movieModel->getAllMovies();
        require '../frontEnd/view/moviesList.php';
        header('Location: /backEnd/');
    }

    public function addMovie()
    {
        $this->movieModel->addMovies(
            $title = $_POST['title'],
            $description = $_POST['description'],
            $duration = $_POST['duration'],
            $release_year = $_POST['release_year'],
            $genre = $_POST['genre'],
            $director = $_POST['director'],
            $created_at = $_POST['created_at'],
            $updated_at = $_POST['updated_at'],
        );
        header('Location: /backEnd/add');
    }


    public function updateMovie()
    {
        $this->movieModel->updateMovies(
            $id = $_POST['$id'],
            $title = $_POST['title'],
            $description = $_POST['description'],
            $duration = $_POST['duration'],
            $release_year = $_POST['release_year'],
            $genre = $_POST['genre'],
            $director = $_POST['director'],
            $created_at = $_POST['created_at'],
            $updated_at = $_POST['updated_at'],
        );
        header('Location: /backEnd/update');
    }

    public function deleteMovie($id)
    {
        $this->movieModel->deleteMovies($id);
        header('Location: /backEnd/delete');
    }
}
?>