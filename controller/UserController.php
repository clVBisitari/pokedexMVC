<?php

class UserController{

    private $model;
    private $presenter;


    public function __construct($model, $presenter){

        $this->model = $model;
        $this->presenter = $presenter;

    }

    public function login(){

        session_start();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST["user"];
            $password = $_POST["pass"];
            $user = $this->model->getUserForNameAndPassword($username, $password);

            if ($user || $_SESSION["login"] = $username) {
                $_SESSION["login"] = $username;
                $this->presenter->render("view/template/header.mustache", ["username" => $username, "loggedIn" => true]);

            } else {
                $this->presenter->render("view/template/header.mustache", ["errorUserOrPass" => "Credenciales incorrectas", "loggedIn" => false]);

            }

        } else {
            echo "los campos no estan completos";
        }

    }
}
