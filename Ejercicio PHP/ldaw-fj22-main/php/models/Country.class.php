<?php

namespace models;

require_once(dirname(__FILE__) . "/../utils/DB.class.php");

//Extraer la clase DB del namespace y asignarle un alias
use DB\DB as DB;

class Country{

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

        $result = DB::getInstance()->query("SELECT * FROM Countries ORDER BY name ASC");

        $countries = [];

        foreach($result as $lang){
            $countries[] = new Country($lang);
        }

        return $countries;

    }

    public static function find($id){

        $result = DB::getInstance()->query("SELECT * FROM Countries WHERE id=?", [$id]);

        return new Country($result[0]);

    }

}