<?php
require_once '../backEnd/models/roomsModels.php';

class roomControllers
{
    private $roomModel;

    public function __construct()
    {
        $this->roomModel = new Rooms();
    }

    public function index()
    {
        $rooms = $this->roomModel->getAllRooms();
        require '../frontEnd/view/moviesList.php';
        header('Location: /backEnd/');
    }

    public function addMovie()
    {
        $this->roomModel->addRooms(
            $title = $_POST['name'],
            $description = $_POST['capacity'],
            $duration = $_POST['type'],
            $release_year = $_POST['active'],
            $updated_at = $_POST['updated_at'],
        );
        header('Location: /backEnd/add');
    }


    public function updateRoom()
    {
        $this->roomModel->updateRooms();
        header('Location: /backEnd/update');
    }

    public function deleteRooms($id)
    {
        $this->roomModel->deleteRooms($id);
        header('Location: /backEnd/delete');
    }
}
?>