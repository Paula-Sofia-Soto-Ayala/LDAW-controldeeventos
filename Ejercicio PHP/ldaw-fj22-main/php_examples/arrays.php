<?php

$array = ["Erik", "Sánchez", "Maldonado"];

//Obtener un elemento
echo($array[2]);//Maldonado

echo("<br/>");

//Esto da error
//echo($array);

//Imprime el contenido del arreglo
print_r($array);

echo("<br/>");

//Imprime el contenido del arreglo con los tipos de datos
var_dump($array);

//Para consultar datos por GET
$id = $_GET["id"];

echo("<br/>");
var_dump($_SERVER);

echo("<br/>");

if(intval($id) === 100){
    echo("hola");
}

//Implode para unir elementos de arreglo en string
echo(implode(" ", $array));
