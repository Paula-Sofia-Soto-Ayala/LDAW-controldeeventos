<?php

namespace models;

//Importar archivo de datos
require_once(dirname(__FILE__) . "/../utils/DB.class.php");

//Extraer la clase DB del namespace y asignarle un alias
use DB\DB as DB;

require_once(dirname(__FILE__) . "/Author.class.php");

use models\Author as Author;

/*
El modelo (clase) Book tiene una función dual: 

+ por un lado una instancia de la clase representa a una 
  fila de la tabla "books" y sus métodos de clase a 
  operaciones que se harían sobre una instancia particular.
  
+ por el otro la clase Book, llamada de forma estática, 
  representa a la tabla y las operaciones que se pueden
  hacer en ella como un todo.
*/

class Book{

    //Atributos de los objetos de la clase

    public $id;
    public $isbn;
    public $title;
    public $summary;
    public $authors;
    public $publisher;
    public $year;
    public $edition;
    public $language;
    public $price;
    public $categories;
    public $cover;


    //Constructor: toma un arreglo asociativo con los datos del libro y lo mapea a un objeto
    public function __construct($array){
        //Setear sus valores
        $this->id = $array["id"];
        $this->isbn = $array["isbn"];
        $this->title = $array["title"];
        $this->summary = $array["summary"];
        $this->authors = $this->getAuthors();
        $this->publisher = $this->getPublisher($array["publisher_id"]);
        $this->year = $array["year"];
        $this->edition = $array["edition"];
        $this->language = $this->getLanguage($array["language_id"]);
        $this->price = $array["price"];
        $this->categories = $this->getCategories();
        $this->cover = $array["cover"];
    }

    /****************************
        Métodos de instancia
    *****************************/

    //Obtiene los autores asociados al libro y devuelve una lista de objetos "Author"
    private function getAuthors(){

        $query = "SELECT a.*
            FROM authors a
            JOIN authors_books ab ON a.id = ab.author_id
            JOIN books b ON ab.book_id = b.id 
            WHERE b.id = ?
        ";

        $result = DB::getInstance()->query($query, [$this->id]);

        $authors = [];

        foreach($result as $author){
            $authors[] = new Author($author);
        }

        return $authors;

    }

    //Obtiene las categorías asociadas al libro y devuelve una lista de arreglos asociativos
    //donde cada uno de ellos representa a una categoría
    private function getCategories(){

        $query = "SELECT c.*
            FROM categories c
            JOIN books_categories bc ON c.id = bc.category_id
            JOIN books b ON bc.book_id = b.id 
            WHERE b.id = ?
        ";

        return DB::getInstance()->query($query, [$this->id]);

    }

    //Obtiene los datos de la editorial del libro como un arreglo asociativo
    private function getPublisher($id){

        $query = "SELECT * FROM publishers WHERE id = ?";

        return DB::getInstance()->query($query, [$id])[0];

    }

    //Obtiene los datos del idioma del libro como un arreglo asociativo
    private function getLanguage($id){

        $query = "SELECT * FROM languages WHERE id = ?";

        return DB::getInstance()->query($query, [$id])[0];

    }

    //Devuelve una lista separada por comas con los nombres completos de los autores del libro
    public function getAuthorsNames(){
        
        $names = [];

        foreach($this->authors as $author){

            $names[] = $author->getFullName();

        }

        return implode(", ", $names);
    }

    //Devuelve la URL completa de la imagen de la portada del libro
    public function getCoverPath(){
        return "./img/books_covers/" . $this->cover;
    }


    /***************************
    Métodos de tabla (estáticos)
    ****************************/

    //Recuperar todos los libros (devuelve un arreglo de objetos Book)
    public static function getBooks(){

        $result = DB::getInstance()->query("SELECT * FROM books");
        
        $bookList = [];

        foreach($result as $book){

            //Crear una instancia de Book
            $bookList[] = new Book($book);
        }

        // echo "<pre>";
        // var_dump($bookList);
        // echo "</pre>";

        return $bookList;

    }

    //Busca un libro por su ID y devuelve una instancia Book
    public static function find($id){

        $result = DB::getInstance()->query("SELECT * FROM books WHERE id=?", [$id]);

        return new Book($result[0]);

    }

    public static function save($data){

        $result = DB::getInstance()->insert(
            "INSERT INTO books values(?,?,?,?,?,?,?,?,?)",
            [
                $data["isbn"]//...
            ]
        );

    }

    public static function deleteByAuthor($author_id){
        $result = DB::getInstance()->query("
        SELECT b.* 
        FROM books b 
        INNER JOIN authors_books ab ON ab.book_id = b.id
        WHERE ab.author_id = ?
        ", [$author_id]);

        foreach ($result as $book) {
            Book::delete($book['id']);
        }
    }

    public static function delete($id){
        $result = DB::getInstance()->delete(
            "DELETE FROM books WHERE id = ?",
            [
                $id
            ]
        );
    }

}



