<?php

$name = "Julio";
$myNameIs = 'Mi name es $name';

echo('Mi nombre es $name<br/>');//Mi nombre es $name
echo("Mi nombre es $name<br/>");//Mi nombre es Julio
echo('Mi name es ' . $name . '<br/>');//Mi name es Julio

$student = "A00888867,Erik,ISC";
$data = explode(",", $student);

//var_dump($data);

echo("Matrícula: $data[0]<br/>");
echo("name: $data[1]<br/>");
echo("Carrera: $data[2]<br/>");