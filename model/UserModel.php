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
    public function writeSession($id, $isActive, $sessionId){

        return $this->database->execute("UPDATE `users` SET `isActive` = $isActive, `sessionId` = '$sessionId' WHERE `id` = $id ");
    }
    public function closeSession($id = null, $username){
        var_dump($id, $username);
        $wasSuccessful = $this->database->execute("UPDATE `users` SET `isActive` = false WHERE `id` = $id OR `username` = '$username'");

        return $wasSuccessful;
    }
    public function addUser($userName, $password)
    {
        return $this->database->execute("INSERT INTO `users`(`userName`, `password`) VALUES ( '$userName' , '$password')");
    }

    public function getUserForNameAndPassword($username, $password){

        $user = $this->database->query("SELECT * FROM users WHERE username ='$username' && password = '$password'");
        return $user;
}
}