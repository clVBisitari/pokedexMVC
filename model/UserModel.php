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
        return $this->database->query("SELECT * FROM USER WHERE id = '$id'");
    }
    public function writeSession($id, $isActive, $sessionId){

        return $this->database->execute("UPDATE `user` SET `isActive` = $isActive, `sessionId` = '$sessionId' WHERE `id` = $id ");
    }
    public function closeSession($id = null, $username){
        var_dump($id, $username);
        $wasSuccessful = $this->database->execute("UPDATE `user` SET `isActive` = false WHERE `id` = $id OR `username` = '$username'");

        return $wasSuccessful;
    }
    public function addUser($userName, $password)
    {
        return $this->database->execute("INSERT INTO `user`(`userName`, `password`) VALUES ( '$userName' , '$password')");
    }

    public function getUserForNameAndPassword($username, $password){

        $user = $this->database->query("SELECT * FROM user WHERE username ='$username' && password = '$password'");
        return $user;
}
}