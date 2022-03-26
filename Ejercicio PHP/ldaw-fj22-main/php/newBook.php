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

["languages" => "Roberto", "pageName" => "Hernández"] se transformará en las variables:
$languages = "Roberto" y $pageName = "Hernández"
*/
extract($controller->newBook());

?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Nuevo Libro</title>

        <!--
        ***********************************
                        CSS
        ***********************************
        -->
           
        <!-- Partial con los estilos generales -->
        <?php require_once(dirname(__FILE__) . "/partials/styles.php"); ?>

        <!-- Multiselect -->
        <link rel="stylesheet" href="./js/multiselect/css/multi-select.css" />

        <!-- Page CSS -->
        <link rel="stylesheet" href="./css/newBook.css" />
            
    </head>

    <body>

        <!-- Partial del header -->
        <?php require_once(dirname(__FILE__) . "/partials/header.php"); ?>

        <!-- Partial de navegación principal -->
        <?php require_once(dirname(__FILE__) . "/partials/main_nav.php"); ?>

        <!-- Contenido principal -->
        <main class="container-fluid py-5 mb-5">

            <h2>Nuevo Libro</h2>

            <form action="./newBook.php" method="post" id="newBookForm" class="mx-auto mt-sm-5">

                <div class="form-group mb-3">
                    <label for="isbn">ISBN</label>
                    <input type="text" class="form-control" id="isbn" name="isbn" required />
                </div>

                <div class="form-group mb-3">
                    <label for="title">Título</label>
                    <input type="text" class="form-control" id="title" name="title" required />
                </div>

                <div class="form-group mb-3">
                    <label for="publisher">Editorial</label>
                
                    <select class="form-select w-50" id="publisher" name="publisher" required>

                        <?php foreach($publishers as $publisher){ ?>

                            <option value="<?php echo($publisher->id); ?>">
                                <?php echo($publisher->name); ?>
                            </option>
                        
                        <?php } ?>

                    </select>
                
                </div>

                <div class="form-group mb-3">
                    <label for="edition">Edición</label>
                    <input type="text" class="form-control w-50" id="edition" name="edition" required />
                </div>

                <div class="form-group mb-3">
                    <label for="year">Año</label>
                    <input type="number" class="form-control w-25" id="year" name="year" step="1" required />
                </div>

                <div class="form-group mb-3">
                    <label for="summary">Sinopsis</label>
                    <textarea class="form-control" id="summary" name="summary" ></textarea>
                </div>

                <div class="form-group mb-3">
                    <label for="language">Idioma</label>
                    <select class="form-select w-25" id="language" name="language" required>

                        <?php foreach($languages as $lang){ ?>

                            <option value="<?php echo($lang->id); ?>">
                                <?php echo($lang->name); ?>
                            </option>
                        
                        <?php } ?>

                    </select>
                </div>

                <div class="form-group mb-3">
                    <label for="authors" class="mb-2">Autor(es)</label>

                    <select multiple="multiple" id="authors" name="authors[]">
                        
                        <?php foreach($authors as $author){ ?>

                            <option value="<?php echo($author->id); ?>">
                                <?php echo($author->getLastFirst()); ?>
                            </option>

                        <?php } ?>

                    </select>

                </div>

                <div class="form-group mb-3">
                    <label for="category">Categorías</label>

                    <div class="mt-3 categories-list">
                        
                        <?php foreach($categories as $category){ ?>
                        
                            <div class="form-check form-check-inline">
                                
                                <input 
                                    class="form-check-input" 
                                    type="checkbox" 
                                    name="<?php echo('category[' . $category->id . ']') ?>" 
                                    id="<?php echo('category_' . $category->id) ?>" 
                                    value="1" 
                                />

                                <label class="form-check-label" for="category_1">
                                    <?php echo($category->name); ?>
                                </label>
                            
                            </div>

                        <?php } ?>
                        
                    </div>
                    
                </div>

                <div class="form-group mt-4">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>

            </form>

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

    <!-- Multiselect -->
    <script src="./js/multiselect/js/jquery.multi-select.js"></script>

    <script>
        //Configuración del multiselect
        $('#authors').multiSelect();
    </script>

</html>