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

    public function addFriend(array $request){
        $errors = [];

        $friend = array_map('trim', $request);

        $friend['prenom'] !== '' ?: array_push($errors, "Il faut renseigner un prénom !");
        $friend['nom'] !== '' ?: array_push($errors, "Il faut renseigner un nom !");

        if(count($errors) === 0){
            $query = "INSERT INTO friend (firstname, lastname) VALUES ('".strip_tags($friend['prenom'])."','".strip_tags($friend['nom'])."')";
            $this->pdo->exec($query);
        } else {
            return $errors;
        }
    }

}

