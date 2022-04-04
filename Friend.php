<?php

class Friend {

    private $pdo;

    public function __construct()
    {
        require_once '_connec.php';
        $this->pdo = new \PDO(DSN, USER, PASS);
    }

    public function getFriends(): array{

        $query = "SELECT * FROM friend";
        $statement = $this->pdo->query($query);

        return $statement->fetchAll();
    }

    public function addFriend(){

        $query = "INSERT INTO friend (firstname, lastname) VALUES ($firstName, $lastName)";
        $statement = $this->pdo->exec($query);

    }

}

