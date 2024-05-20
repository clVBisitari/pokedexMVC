<?php

namespace model;

class UserModel
{
    private $database;

    public function __construct($database)
    {
        $this->database = $database;
    }

    public function getUser($id){
        return $this->database->query("SELECT * FROM USERS WHERE id = '$id'");
    }

    public function addUser($userName, $password)
    {
        $this->database->execute("INSERT INTO `users`(`userName`, `password`) VALUES ('" . $nombre ."','2024-1-1',10)");
    }
}