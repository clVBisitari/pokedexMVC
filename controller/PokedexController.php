<?php

class PokedexController
{
    private $pokemonModel;
    private $userModel;
    private $presenter;

    public function __construct($pokemonModel, $userModel, $presenter)
    {
        $this->pokemonModel = $pokemonModel;
        $this->userModel = $userModel;
        $this->presenter = $presenter;
    }

    public function get()
    {
        $pokemons = $this->pokemonModel->getPokemons();

        if (isset($_POST['submit'])) {
//            var_dump($_SERVER['REQUEST_METHOD']);
            session_start();
            $username = $_POST["user"];
            $password = $_POST["pass"];
            $user = $this->userModel->getUserForNameAndPassword($username, $password);
//            var_dump( $user);

            if ($user && $user[0]["password"] == $password) {

//                $_SESSION["login"] = $username;
//                $_SESSION["password"] = $password;

                $this->presenter->render("view/pokedexView.mustache", ["pokemons" => $pokemons, "loggedIn" => true, "username" => $username]);
            }
            else {
                $this->presenter->render("view/pokedexView.mustache", ["pokemons" => $pokemons, "errorUserOrPass" => "Credenciales incorrectas", "loggedIn" => false]);
//                $this->presenter->render("/header.mustache", ["errorUserOrPass" => "Credenciales incorrectas", "loggedIn" => false]);
            }

        } else {
            session_destroy();
            $this->presenter->render("view/pokedexView.mustache", ["pokemons" => $pokemons]);
        }
    }

    public function details(){

    }


}