<?php

namespace controllers;

require_once(dirname(__FILE__) . "/../models/Author.class.php");
use models\Author as Author;

require_once(dirname(__FILE__) . "/../models/Country.class.php");
use models\Country as Country;

class AuthorsController{
    //Definición de variables de instancia
    private $controllerName = "AuthorsController";

    //Constructor por omisión
    public function __construct(){}

    //Método de la clase para manejar la vista "index"
    public function index(){

        if(isset($_GET['id']) && isset($_GET['action'])){
            Author::delete($_GET['id']);
        }

        $authors = Author::getAll();

        return [
            "authors" => $authors,
            "pageName" => "index"
        ];

    }    

    private function saveAuthor(){

        $first_name = $_POST["first_name"];
        $last_name = $_POST["last_name"];
        $country_id = $_POST["country_id"];

        Author::save([
            "id" => null,
            "first_name" => $first_name,
            "last_name" => $last_name,
            "country_id" => $country_id
        ]);

    }

    public function newAuthor(){

        if(strtolower($_SERVER["REQUEST_METHOD"]) === "post"){

            $this->saveAuthor();            

        }

        $countries = Country::getAll();

        return [
            "countries" => $countries,
            "pageName" => "newAuthor"
        ];

    }
}