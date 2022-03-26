<?php 

require_once(dirname(__FILE__) . "/controllers/AuthorsController.class.php");

use controllers\AuthorsController as AuthorsController;

$controller = new AuthorsController();
extract($controller->newAuthor());

?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Nuevo Autor</title>

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
        <link rel="stylesheet" href="./css/newAuthor.css" />
            
    </head>

    <body>

        <!-- Partial del header -->
        <?php require_once(dirname(__FILE__) . "/partials/header.php"); ?>

        <!-- Partial de navegación principal -->
        <?php require_once(dirname(__FILE__) . "/partials/main_nav.php"); ?>

        <!-- Contenido principal -->
        <main class="container py-5 mb-5">

            <h2>Nuevo Libro</h2>

            <form action="./newAuthor.php" method="post" id="newAuthorForm" class="mx-auto mt-sm-5">

                <div class="form-group mb-3">
                    <label for="first_name">Primer nombre</label>
                    <input type="text" class="form-control" id="first_name" name="first_name" required />
                </div>

                <div class="form-group mb-3">
                    <label for="last_name">Apellidos</label>
                    <input type="text" class="form-control" id="last_name" name="last_name" required />
                </div>

                <div class="form-group mb-3">
                    <label for="country_id">País</label>
                
                    <select class="form-select" id="country_id" name="country_id" required>

                        <?php foreach($countries as $countrie){ ?>

                            <option value="<?php echo($countrie->id); ?>">
                                <?php echo($countrie->name); ?>
                            </option>
                        
                        <?php } ?>

                    </select>
                
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

</html>