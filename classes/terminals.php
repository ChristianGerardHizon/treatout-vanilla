<?php
class Terminals {

    protected $connection;

    public function __construct($connection) {

        $this->connection = $connection;
    }

    public function getTerminalsByPlaceId($id) {

        $query = "SELECT * FROM terminals t INNER JOIN transportation tt ON t.trans_id = tt.trans_id WHERE t.place_id = ?";

        $query = $this->connection->prepare($query);

        $query->execute([$id]);

        return $data =  $query->fetchAll(PDO::FETCH_OBJ);
        
    }
}