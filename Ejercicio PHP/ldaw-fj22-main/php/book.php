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
extract($controller->book());//Devuelve la información particular $book

?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Detalle de Libro</title>

        <!--
        ***********************************
                        CSS
        ***********************************
        -->
           
        <!-- Partial con los estilos generales -->
        <?php require_once(dirname(__FILE__) . "/partials/styles.php"); ?>

        <!-- Page CSS -->
        <link rel="stylesheet" href="./css/book.css" />
            
    </head>

    <body>

        <!-- Partial del header -->
        <?php require_once(dirname(__FILE__) . "/partials/header.php"); ?>

        <!-- Partial de navegación principal -->
        <?php require_once(dirname(__FILE__) . "/partials/main_nav.php"); ?>

        <!-- Contenido principal -->
        <main class="container-fluid py-5 mb-5">

           <h2 class="mb-5"><?php echo($book->title); ?></h2>

           <div class="row mt-4">
               
            <div class="col-4 text-center">
                   <img 
                        src="<?php echo($book->getCoverPath()); ?>" 
                        alt="El Conde de Montecristo"
                        class="book-cover"
                    />

                    <h3 class="rounded-pill text-center py-3 mx-4 mt-4 price">
                        $<?php echo($book->price) ?>
                    </h3>

            </div>

            <div class="col">

                <p><?php echo($book->summary) ?></p>

                <ul class="list-group list-group-flush details-list rounded-3 mt-4">
                    <li class="list-group-item">
                        <strong class="me-2">ISBN:</strong>
                        <span><?php echo($book->isbn) ?></span>
                    </li>
                    <li class="list-group-item">
                        <strong class="me-2">Autor(es):</strong>
                        <span><?php echo($book->getAuthorsNames()); ?></span>
                    </li>
                    <li class="list-group-item">
                        <strong class="me-2">Editorial:</strong>
                        <span><?php echo($book->publisher["name"]) ?></span>
                    </li>
                    <li class="list-group-item">
                        <strong class="me-2">Año:</strong>
                        <span><?php echo($book->year) ?></span>
                    </li>
                    <li class="list-group-item">
                        <strong class="me-2">Edición:</strong>
                        <span><?php echo($book->edition) ?> edición</span>
                    </li>
                    <li class="list-group-item">
                        <strong class="me-2">Idioma:</strong>
                        <span><?php echo($book->language["name"]) ?></span>
                    </li>
                </ul>

                <div class="keywords mt-5">

                    <?php foreach($book->categories as $category){ ?>

                        <span class="badge rounded-pill px-3 py-2 me-2">
                            <?php echo($category["name"]); ?>
                        </span>

                    <?php } ?>

                </div>

            </div>

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