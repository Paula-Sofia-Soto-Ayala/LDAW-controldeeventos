<?php

namespace DB;

//Indicar que se usará la clase PDO
use PDO;

require_once(dirname(__FILE__) . "/../config/config.php");

class DB{

    private static $instance = null;
    private $connection = null;

    //Constructor privado para controlar la creación de instancias
    private function __construct(){

        $this->connection = new PDO(
            'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, 
            DB_USER,
            DB_PASSWORD
        );

    }

    //Método que controla la instanciación (singleton)
    public static function getInstance(){

        if(empty(self::$instance)){
            self::$instance = new DB();
        }

        return self::$instance;

    }

    //Método para ejecutar queries
    public function query($query, $params = []){

        $st = $this->connection->prepare($query);

        //Ejecutar la consulta
        if($st->execute($params)){
            return $st->fetchAll(PDO::FETCH_ASSOC);
        }

        return false;

    }

    //Método para ejecutar inserts
    public function insert($query, $params = []){

        $st = $this->connection->prepare($query);

        //Ejecutar la consulta
        return $st->execute($params);

    }

    //Método para ejecutar deletes
    public function delete($query, $params = []){

        $st = $this->connection->prepare($query);

        //Ejecutar la consulta
        return $st->execute($params);

    }

}