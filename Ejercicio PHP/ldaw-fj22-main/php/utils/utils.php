<?php

namespace utils;

//Función de utiliería para hacer un dump de una variable en formato legible
//Termina la ejecución del script inmediatamente
function dump($var){

    echo "<pre>";
    var_dump($var);
    echo "</pre>";
    die();

};