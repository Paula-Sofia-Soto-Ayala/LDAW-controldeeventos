<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <h1>Ejemplos de PHP</h1>

    <?php
    /*Comentario*/
    #Comentario
    //phpinfo();

    /*
    Variables en PHP
    ----------------
    + Siempre empiezan con $
    */
    $name = "Erik";
    //Concatenación con "."
    $saludo = "Hola " . $name . ", bienvenido";

    //Tipos de datos
    $string = "texto";
    $string2 = 'texto';
    $boolean = true; //false
    $number = 123; //123.45, -123
    $object = new stdClass(); //Objeto genérico vacío
    $array = [1,2,"3",4,true]; //Arreglo
    //Arreglo asociativo (objeto JS)
    $assocArray = [
        "name" => "Erik",
        "lastname" => "Sánchez"
    ];

    $assocArray["age"] = 18;

    //Consultar valores de array
    echo($array[3]); //4
    echo($assocArray["lastname"]); //Sánchez

    //Cómo imprimir datos con PHP
    echo("<h2>Hola mundo!</h2><br/>");
    print("Hello world!<br/>");
    echo($saludo);

    echo "<br/>";

    //Constantes
    const PI = 3.1416, HOST = "localhost";

    echo("El valor de HOST es: " . HOST);

    ?>

    <script>
        //document.write("<?php echo('hola'); ?>");
        <?php echo("alert('hola');") ?>
    </script>
    
</body>
</html>
