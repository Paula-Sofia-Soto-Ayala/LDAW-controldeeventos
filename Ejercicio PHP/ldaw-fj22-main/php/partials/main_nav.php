<nav class="container-fluid navbar navbar-expand-md navbar-light position-sticky top-0">

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <a class="navbar-brand d-md-none" href="#">Menu</a>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">

        <ul class="navbar-nav w-100 justify-content-center">
            <li class="nav-item">
                <a class="nav-link py-3 px-4 active" href="./index.php">Catálogo</a>
            </li>
            <li class="nav-item dropdown">
                <a 
                    class="nav-link dropdown-toggle py-3 px-4" 
                    id="booksDropdown" 
                    href="#" 
                    role="button"
                    data-bs-toggle="dropdown" 
                    aria-expanded="false"
                >
                    Libros
                </a>

                <ul class="dropdown-menu m-0 border-0" aria-labelledby="booksDropdown">
                    <li>
                        <a class="dropdown-item text-center text-md-start" href="./newBook.php">
                            Nuevo
                        </a>
                    </li>
                </ul>

            </li>
            <li class="nav-item dropdown">
                <a 
                    class="nav-link dropdown-toggle py-3 px-4" 
                    href="#"
                    id="authorsDropdown" 
                    href="#" 
                    role="button"
                    data-bs-toggle="dropdown" 
                    aria-expanded="false"
                >
                    Autores
                </a>

                <ul class="dropdown-menu m-0 border-0" aria-labelledby="authorsDropdown">
                    <li>
                        <a class="dropdown-item text-center text-md-start" href="./authors.php">
                            Listado
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item text-center text-md-start" href="./newAuthor.php">Nuevo</a>
                    </li>
                </ul>

            </li>
        </ul>

    </div>

</nav>
