<?php

use controller\PokedexController;
use model\PokemonModel;

class Configuration
{

    // CONTROLLERS
    public static function getPokedexController()
    {
        return new PokedexController(self:: getPokemonModel(), self::getPresenter());
    }


    public static function getSearchPokemonController()
    {
        return new SearchPokemonController(self::getPokemonModel(), self::getPresenter());
    }

    // MODELS
    private static function getPokemonModel()
    {
        return new PokemonModel(self::getDatabase());
    }


    // HELPERS
    public static function getDatabase()
    {
        $config = self::getConfig();
        return new Database($config["servername"], $config["username"], $config["password"], $config["dbname"]);
    }

    private static function getConfig()
    {
        return parse_ini_file("config/config.ini");
    }


    public static function getRouter()
    {
        return new Router("getPokedexController", "get");
    }

    private static function getPresenter()
    {
        return new MustachePresenter("view/template");
    }
}