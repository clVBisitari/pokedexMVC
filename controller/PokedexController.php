<?php

class PokedexController
{
    private $pokemonModel;
    private $userModel;
    private $presenter;
    private $username;
    private $session_started = false;
    public function __construct($pokemonModel, $userModel, $presenter)
    {
        $this->pokemonModel = $pokemonModel;
        $this->userModel = $userModel;
        $this->presenter = $presenter;
    }

    public function get()
    {
        $pokemons = $this->pokemonModel->getPokemons();
        if(isset($_GET["cerrarSesion"])){
            echo $_GET['username'];
            $this->userModel->closeSession($_GET["username"]);
            session_write_close();
        }
        $this->presenter->render("view/pokedexView.mustache", ["pokemons" => $pokemons, "loggedIn" => isset($_SESSION)]);
    }
    public function post(){
        $pokemons = $this->pokemonModel->getPokemons();
        if (isset($_POST['iniciarSesion'])) {
            session_start();
            if(!isset($this->username)){
                $this->username = $_POST["user"];
                $password = $_POST["pass"];
            }
            $user = $this->userModel->getUserForNameAndPassword($this->username, $password);

            if ($user && $user[0]["password"] == $password) {

                $writeSession = $this->userModel->writeSession($user[0]["id"], true, session_id());
//                var_dump($writeSession);
                if(!isset($_SESSION["user"])){
                    $_SESSION["user"] = $user[0]["username"];
                }

                $_SESSION["password"] = $user[0]["password"];
                $_SESSION["loggedIn"] = true;
                $this->session_started = true;
                $this->presenter->render("view/pokedexView.mustache", ["pokemons" => $pokemons, "loggedIn" => $_SESSION["loggedIn"] == 1, "username" => $this->username]);
            }
            else {
                $_SESSION["loggedIn"] = false;
                $this->presenter->render("view/pokedexView.mustache", ["pokemons" => $pokemons, "errorUserOrPass" => "Credenciales incorrectas", "loggedIn" => $_SESSION["loggedIn"] == 1]);
            }
        } else {
            session_write_close();
            $this->presenter->render("view/pokedexView.mustache", ["pokemons" => $pokemons, "loggedIn" => isset($_SESSION)]);
        }
    }
    public function delete(){

    }

    public function detail(){
//        session_start();
        $pokemon = $this->pokemonModel->detailPokemon($_GET["id"]);

        $this->presenter->render("view/detail.mustache", ["pokemon" => $pokemon, "loggedIn" => $_GET["loggedIn"] == 1, "username" => $this->username]);

    }


}