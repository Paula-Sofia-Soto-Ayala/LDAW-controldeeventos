<?php

namespace models;

require_once(dirname(__FILE__) . "/../utils/DB.class.php");

//Extraer la clase DB del namespace y asignarle un alias
use DB\DB as DB;

class Category{

    public $id;
    public $name;
    public $description;

    public function __construct($array){

       $this->id = $array["id"];
       $this->name = $array["name"];
       $this->description = $array["description"];
    
    }

    /************************
        MÉTODOS ESTÁTICOS
    *************************/

    public static function getAll(){

        $result = DB::getInstance()->query("SELECT * FROM categories ORDER BY name ASC");

        $categories = [];

        foreach($result as $category){
            $categories[] = new Category($category);
        }

        return $categories;

    }

}