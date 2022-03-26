<?php

//Importar la clase del controller
require_once(dirname(__FILE__) . "/controllers/AuthorsController.class.php");
//Extraer la clase de su namespace y asignarle un alias
use controllers\AuthorsController as AuthorsController;

//Crear una instancia del controller
$controller = new AuthorsController();

/*
Ejecutar el método del controller que manejará a esta vista
El método devuelve un arreglo asociativo con los datos que utilizará la vista

La función "extract" extrae los datos del arreglo y los transforma en variables
los nombres de las variables serán los mismos que las llaves del arreglo y 
almacenarán los valores correspondientes.

Por ejemplo:

["name" => "Roberto", "lastname" => "Hernández"] se transformará en las variables:
$name = "Roberto" y $lastname = "Hernández"
*/
extract($controller->index());

?>


<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Catálogo de Libros</title>

        <!--
        ***********************************
                        CSS
        ***********************************
        -->

        <!-- Partial con los estilos generales -->
        <?php require_once(dirname(__FILE__) . "/partials/styles.php"); ?>

        <!-- Page CSS -->
        <link rel="stylesheet" href="./css/index.css" />
            
    </head>

    <body>
        <!-- Partial del header -->
        <?php require_once(dirname(__FILE__) . "/partials/header.php"); ?>

        <!-- Partial de navegación principal -->
        <?php require_once(dirname(__FILE__) . "/partials/main_nav.php"); ?>
        
        <!-- Contenido principal -->
        <main class="container py-5 mb-5">
            <div>
                <table class="table">
                    <thead>
                        <th>Primer nombre</th>
                        <th>Apellidos</th>
                        <th>País</th>
                        <th></th>
                    </thead>  
                    <tbody>
                    <?php foreach($authors as $author){ ?>
                        <tr>
                            <td><?= $author->firstName ?></td>
                            <td><?= $author->lastName ?></td>
                            <td><?= $author->country->name ?></td>
                            <td>
                                <a class="btn btn-dark" href="./authors.php?action=delete&id=<?php echo($author->id); ?>">Eliminar</a>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>  
                </table>
            </div>

        </main>

        <!-- Partial del footer -->
        <?php require_once(dirname(__FILE__) . "/partials/footer.php"); ?>
        
    </body>

    <!--
    *******************************
            JAVASCRIPT
    *******************************
    -->
    
    <!-- Partial con los scripts generales -->
    <?php require_once(dirname(__FILE__) . "/partials/scripts.php"); ?>

</html>