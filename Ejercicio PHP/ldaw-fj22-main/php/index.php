<?php

//Importar la clase del controller
require_once(dirname(__FILE__) . "/controllers/BooksController.class.php");
//Extraer la clase de su namespace y asignarle un alias
use controllers\BooksController as BooksController;

//Crear una instancia del controller
$controller = new BooksController();

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
        <main class="container-fluid py-5 mb-5">

            <div class="card-group justify-content-center books-container">

                <?php foreach($books as $book){ ?>

                    <div class="card mx-3 border-0 text-center my-3">

                        <div class="card-header">
                            <?php echo($book->authors[0]->getFullName()); ?>
                        </div>

                        <img 
                            src="<?php echo($book->getCoverPath()); ?>" 
                            class="card-img-top mt-2" 
                            alt="<?php echo($book->title); ?>"
                        />

                        <div class="card-body">
                            <h5 class="card-title">
                                <?php echo($book->title); ?>
                            </h5>
                            <p class="card-text">
                                $<?php echo($book->price); ?>
                            </p>
                        </div>

                        <div class="card-footer">
                            <a 
                                href="./book.php?id=<?php echo($book->id); ?>" 
                                class="btn btn-primary"
                            >
                                Detalle
                            </a>
                        </div>

                    </div>

                <?php } ?>

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