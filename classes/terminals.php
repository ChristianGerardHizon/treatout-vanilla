<?php
class Terminals {

    protected $connection;

    public function __construct($connection) {

        $this->connection = $connection;
    }

    public function getTerminalsByPlaceId($id) {

        $query = "SELECT * FROM terminals WHERE place_id = ?";

        $query = $this->connection->prepare($query);

        $query->execute([$id]);

        return $data =  $query->fetchAll(PDO::FETCH_OBJ);
        
    }
}