<?php

class Movies
{
    private $db;
    public function __construct()
    {
        $servername = "localhost";
        $username = "Coco";
        $password = "Coconuts77";
        $dbname = "Cinema";
        $this->db = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    }

    public function getAllMovies()
    {
        $query = $this->db->prepare("SELECT * FROM movies");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getMovies($movieId)
    {
        $query = $this->db->prepare("SELECT * FROM movies WHERE id= :id");
        $query->bindParam(':id', $movieId);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addMovies($title, $description, $duration, $release_year, $genre, $director, $created_at, $updated_at)
    {

        $query = $this->db->prepare("INSERT INTO movies (title, description, duration, release_year, genre, director, created_at, updated_at) VALUES (:title, :description,  :duration, :release_year, :genre, :director, :created_at, :updated_at)");
        $query->bindParam(":title", $title);
        $query->bindParam(":description", $description);
        $query->bindParam(":duration", $duration);
        $query->bindParam(":release_year", $release_year);
        $query->bindParam(":genre", $genre);
        $query->bindParam(":director", $director);
        $query->bindParam(":created_at", $created_at);
        $query->bindParam(":updated_at", $updated_at);
        $query->execute();
        echo json_encode(["message" => "User added successfully"]);
    }
    public function updateMovies()
    {
        $query = $this->db->prepare("UPDATE  movies SET  title=?, 
                     description=?, duration=?, release_year=?, genre=?, director=?, created_at=?, updated_at=? WHERE id =?");
        $created =  strtotime($_POST['created_at']);
        $updated =  strtotime($_POST['updated_at']);
        $query->execute(array($_POST["id"],
        $_POST["title"],
        $_POST["description"],
        $_POST["duration"],
        $_POST["release_year"],
        $_POST["genre"],
        $_POST["director"],
        $created,
        $updated));
        echo json_encode(["message" => "User updated successfully"]);
    }

    public function deleteMovies($id)
    {
        $query = $this->db->prepare("DELETE FROM movies WHERE id= :id");
        $query->bindParam(':id', $id);
        $query->execute();
        echo json_encode(["message" => "movies deleted successfully"]);
    }


}










?>