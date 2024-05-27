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
        $query = "SELECT pokemon.*,  
        tipo1.name AS type1_name, 
        tipo1.image AS type1_image, 
        tipo2.name AS type2_name, 
        tipo2.image AS type2_image
        FROM pokemon
        INNER JOIN type as tipo1
        ON pokemon.idType1 = tipo1.id
        LEFT JOIN type as tipo2 ON pokemon.idType2 = tipo2.id";


        return $this->database->query($query);
    }

    public function detailPokemon($id)
    {
        return $this->database->query("SELECT * FROM pokemon WHERE id = $id ");
    }
}