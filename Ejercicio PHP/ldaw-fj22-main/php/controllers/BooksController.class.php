<?php

//Definición de namespace para evitar la colisión de nombres
namespace controllers;

//Importar el modelo
require_once(dirname(__FILE__) . "/../models/Book.class.php");

//Extraer la clase Book
use models\Book as Book;

require_once(dirname(__FILE__) . "/../models/Language.class.php");

//Extraer la clase Language
use models\Language as Language;

require_once(dirname(__FILE__) . "/../models/Author.class.php");

//Extraer la clase Author
use models\Author as Author;

require_once(dirname(__FILE__) . "/../models/Category.class.php");

//Extraer la clase Category
use models\Category as Category;

require_once(dirname(__FILE__) . "/../models/Publisher.class.php");

//Extraer la clase Publisher
use models\Publisher as Publisher;

require_once(dirname(__FILE__) . "/../utils/utils.php");

use function utils\dump as dump;


//Definición de la clase
class BooksController{

    //Definición de variables de instancia
    private $controllerName = "BooksController";

    //Constructor por omisión
    public function __construct(){}

    //Método de la clase para manejar la vista "index"
    public function index(){

        $books = Book::getBooks();

        return [
            "books" => $books,
            "pageName" => "index"
        ];

    }

    //Método que controlará la vista del detalle de libros
    public function book(){

        //Obtener el ID
        $id = $_GET["id"];

        //Buscar el libro en la BD (modelo)
        $book = Book::find($id);

        //dump($book->categories);
        
        return [
            "book" => $book,
            "pageName" => "book"
        ];

    }

    private function saveBook(){

        //Extraer la información
        $isbn = $_POST["isbn"];
        $title = $_POST["title"];
        $publisher = $_POST["publisher"];
        $edition = $_POST["edition"];
        $year = $_POST["year"];
        $summary = $_POST["summary"];
        $language = $_POST["language"];
        $authors = $_POST["authors"];
        $categories = $_POST["categories"];

        //Validar los datos
        Book::save([
            "id" => null,
            "isbn" => $isbn,
            "title" => $title,
            "publisher_id" => $publisher,
            "edition" => $edition,
            "year" => $year,
            "summary" => $summary,
            "authors" => $authors,
            "categories" => $categories
        ]);

        // Book::save([

        // ]);

    }

    public function newBook(){

        if(strtolower($_SERVER["REQUEST_METHOD"]) === "post"){

            $this->saveBook();            

        }

        $languages = Language::getAll();
        $authors = Author::getAll();
        $categories = Category::getAll();
        $publishers = Publisher::getAll();

        //dump($authors);

        return [
            "languages" => $languages,
            "authors" => $authors,
            "categories" => $categories,
            "publishers" => $publishers,
            "pageName" => "newBook"
        ];

    }

}