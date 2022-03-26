<?php

namespace models;

require_once(dirname(__FILE__) . "/../utils/DB.class.php");

//Extraer la clase DB del namespace y asignarle un alias
use DB\DB as DB;

class Language{

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

        $result = DB::getInstance()->query("SELECT * FROM languages ORDER BY name ASC");

        $languages = [];

        foreach($result as $lang){
            $languages[] = new Language($lang);
        }

        return $languages;

    }

}