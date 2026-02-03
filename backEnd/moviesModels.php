<?php
include 'main.php';

header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods: *" );

$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {
    case 'GET':
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $result = $conn->query("SELECT * FROM movies WHERE id=$id");
            $data = $result->fetch();
            echo json_encode($data);
        } else {
            $result = $conn->query("SELECT * FROM movies");
            $users = [];
            while ($row = $result->fetch()) {
                $users[] = $row;
            }
            echo json_encode($users);
        }
        break;

    case 'POST':
        $title = $_POST['title'];
        $description = $_POST['description'];
        $duration = $_POST['duration'];
        $release_year = $_POST['release_year'];
        $genre = $_POST['genre'];
        $director = $_POST['director'];
        $created_at = $_POST['created_at'];
        $updated_at = $_POST['updated_at'];
        $conn->query("INSERT INTO movies (title, description, duration, release_year, genre, director, created_at, updated_at) VALUES ('$title', '$description', '$duration','$release_year','$genre','$director','$created_at','$updated_at')");
        echo json_encode(["message" => "User added successfully"]);
        break;

    case 'PUT':
        $result = [];
        parse_str(file_get_contents('php://input'), $result);
        $result = json_decode(key($result), true);
        var_dump($result);
        $id = $result['id'];
        $title = $result['title'];
        $description = $result['description'];
        $duration = $result['duration'];
        $release_year = $result['release_year'];
        $genre = $result['genre'];
        $director = $result['director'];
        $created_at =strtotime($result['created_at']);
        $created_at = date('Y-m-d H:i:s', $created_at);
        $updated_at = strtotime($result['updated_at']);
        $updated_at = date('Y-m-d H:i:s', $updated_at);
        $conn->query("UPDATE movies SET title='$title',
                     description='$description',duration='$duration',release_year='$release_year',genre='$genre',director='$director',created_at='$created_at',updated_at='$updated_at' WHERE id='$id'");
        echo json_encode(["message" => "User updated successfully"]);
        break;

    case 'DELETE':
        $id = $_GET['id'];
        $conn->query("DELETE FROM movies WHERE id=$id");
        echo json_encode(["message" => "movies deleted successfully"]);
        break;

    default:
        echo json_encode(["message" => "Invalid request method"]);
        break;
}



?>