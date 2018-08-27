<?php
class Places {

    protected $connection;

    public function __construct($connection) {

        $this->connection = $connection;
    }

    public function getAll() {

        $query = "SELECT * FROM places";

        $query = $this->connection->prepare($query);

        $query->execute();

        return $data =  $query->fetchAll(PDO::FETCH_OBJ);
        
    }


    public function checkPlace($id) {

        $query = "SELECT * FROM places WHERE place_id = ?";

        $query = $this->connection->prepare($query);

        $query->execute([$id]);

        // $data =  $query->fetchAll(PDO::FETCH_OBJ);

        return $count = $query->rowCount();
    }


    public function show($id) {

        $query = "SELECT * FROM places WHERE place_id = ?";

        $query = $this->connection->prepare($query);

        $query->execute([$id]);

        return $data =  $query->fetchAll(PDO::FETCH_OBJ);

    }

}