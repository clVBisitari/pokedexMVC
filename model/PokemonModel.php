<?php

namespace model;

class PokemonModel
{
    private $database;

    public function __construct($database)
    {
        $this->database = $database;
    }

    public function getPokemons(){
        return $this->database->query("SELECT * FROM POKEDEX");
    }

    public function addTour($nombre)
    {
        $this->database->execute("INSERT INTO `pokedex`(`nombre`, `fecha`, `precio`) VALUES ('" . $nombre ."','2024-1-1',10)");
    }
}