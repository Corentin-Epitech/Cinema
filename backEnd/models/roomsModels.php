<?php

class Rooms
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

    public function getAllRooms()
    {
        $query = $this->db->prepare("SELECT * FROM rooms");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getRooms($roomId)
    {
        $query = $this->db->prepare("SELECT * FROM rooms WHERE id= :id");
        $query->bindParam(':id', $roomId);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addRooms($name, $capacity, $type, $active, $updated_at)
    {

        $query = $this->db->prepare("INSERT INTO rooms (name, capacity, type, active,updated_at) VALUES (:name, :capacity,  :type, :active,:updated_at)");
        $query->bindParam(":name", $title);
        $query->bindParam(":capacity", $capacity);
        $query->bindParam(":type", $type);
        $query->bindParam(":active", $active);
        $query->bindParam(":updated_at", $updated_at);
        $query->execute();
        echo json_encode(["message" => "User added successfully"]);
    }
    public function updateRooms()
    {
        $query = $this->db->prepare("UPDATE  rooms SET  name=?, 
                     capacity=?, type=?, active=?, updated_at=? WHERE id =?");
        $created =  strtotime($_POST['created_at']);
        $updated =  strtotime($_POST['updated_at']);
        $query->execute(array($_POST["id"],
        $_POST["name"],
        $_POST["capacity"],
        $_POST["type"],
        $_POST["active"],
        $updated));
        echo json_encode(["message" => "User updated successfully"]);
    }

    public function deleteRooms($id)
    {
        $query = $this->db->prepare("DELETE FROM rooms WHERE id= :id");
        $query->bindParam(':id', $id);
        $query->execute();
        echo json_encode(["message" => "movies deleted successfully"]);
    }


}










?>