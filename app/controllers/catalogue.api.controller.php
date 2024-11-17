<?php
require_once 'app/models/catalogue.model.php';
require_once 'app/views/json.view.php';

class CatalogueApiController {
    private $model;
    private $view;

    public function __construct() {
        $this->model = new CatalogueModel();
        $this->view = new JSONView();
    }

    public function getCatalogue($req, $res) {
        //BOOKS

        //Ordenado
        $sortBooksBy = isset($req->queryParams['sortBooksBy']) ? $req->queryParams['sortBooksBy'] : 'nombre';
        $orderBooks = isset($req->queryParams['orderBooks']) ? strtoupper($req->queryParams['orderBooks']) : 'ASC';

        if ($orderBooks !== 'ASC' && $orderBooks !== 'DESC') {
            return $this->view->response('El parámetro "order" debe ser "ASC" o "DESC"', 400);
        }

        $validSortFields = ['id', 'nombre', 'autor', 'editorial', 'genero', 'ID_genero', 'ID_genero2', 'ID_genero3', 'stock'];
        if (!in_array($sortBooksBy, $validSortFields)) {
            return $this->view->response('Parámetro equivocado', 400);
        }

        //Filtrado
        $filterBooksBy = isset($req->queryParams['filterBooksBy']) ? $req->queryParams['filterBooksBy'] : null;
        $valueBook = isset($req->queryParams['valueBook']) ? $req->queryParams['valueBook'] : null;
        
        if ($filterBooksBy && !in_array($filterBooksBy, $validSortFields)) {
            return $this->view->response('El campo para filtrar es inválido', 400);
        }

        $books = $this->model->getBooks($sortBooksBy, $orderBooks, $filterBooksBy, $valueBook);

        
        //GENRES

        //Ordenado
        $sortGenresBy = isset($req->queryParams['sortGenresBy']) ? $req->queryParams['sortGenresBy'] : 'nombre';
        $orderGenres = isset($req->queryParams['orderGenres']) ? strtoupper($req->queryParams['orderGenres']) : 'ASC';

        if ($orderGenres !== 'ASC' && $orderGenres !== 'DESC') {
            return $this->view->response('El parámetro "order" debe ser "ASC" o "DESC"', 400);
        }

        if ($sortGenresBy !== 'nombre' && $sortGenresBy !== 'id') {
            return $this->view->response('Parámetro equivocado', 400);
        }

        //Filtrado
        $filterGenresBy = isset($req->queryParams['filterGenresBy']) ? $req->queryParams['filterGenresBy'] : null;
        $valueGenre = isset($req->queryParams['valueGenre']) ? $req->queryParams['valueGenre'] : null;
        
        if ($filterGenresBy && $sortGenresBy !== 'nombre' && $sortGenresBy !== 'id') {
            return $this->view->response('El campo para filtrar es inválido', 400);
        }

        $genres = $this->model->getGenres($sortGenresBy, $orderGenres, $filterGenresBy, $valueGenre);


        //AMBOS
        $catalogue = [
            'libros' => $books,
            'generos' => $genres
        ];  

        return $this->view->response($catalogue);
    }

    public function getBook($req, $res) {
        $id = $req->params->id;
        $book = $this->model->getBook($id);

        if(!$book) {
            return $this->view->response('El libro con el id = ' . $id . ' no existe', 404);
        }

        $this->view->response($book);
    }

    public function updateBook($req, $res) {
        $id = $req->params->id;
        $book = $this->model->getBook($id);

        if(!$book) {
            return $this->view->response('El libro con el id = ' . $id . ' no existe', 404);
        }

        if(empty($req->body->nombre) || empty($req->body->autor) || empty($req->body->genero) || empty($req->body->ID_genero) || empty($req->body->stock)) {
            return $this->view->response('Faltan completar datos', 400);
        }

        $name = $req->body->nombre;
        $author = $req->body->autor;
        $editorial = $req->body->editorial;
        $genre = $req->body->genero;
        $idGenre = $req->body->ID_genero;
        $idGenre2 = $req->body->ID_genero2;
        $idGenre3 = $req->body->ID_genero3;
        $stock = $req->body->stock;

        $this->model->updateBook($name, $author, $editorial, $genre, $idGenre, $idGenre2, $idGenre3, $stock, $id);

        $updatedBook = $this->model->getBook($id);
        $this->view->response($updatedBook);

    }

    public function createBook($req, $res) {
        if(empty($req->body->nombre) || empty ($req->body->autor) || empty($req->body->genero) || empty($req->body->ID_genero) || empty($req->body->stock)) {
            return $this->view->response('Faltan completar datos', 400);
        }
        
        $name = $req->body->nombre;
        $author = $req->body->autor;
        $editorial = $req->body->editorial;
        $genre = $req->body->genero;
        $idGenre = $req->body->ID_genero;
        $idGenre2 = $req->body->ID_genero2;
        $idGenre3 = $req->body->ID_genero3;
        $stock = $req->body->stock;

        $id = $this->model->createBook($name, $author, $editorial, $genre, $idGenre, $idGenre2, $idGenre3, $stock);

        if(!$id) {
            return $this->view->response('Error al crear el libro', 500);
        }
        
        $book = $this->model->getBook($id);

        return $this->view->response($book, 201);
    }

    public function getGenre($req, $res) {
        $id = $req->params->id;
        $genre = $this->model->getGenre($id);

        if(!$genre) {
            return $this->view->response('El genero con el id = ' . $id . ' no existe', 404);
        }

        $this->view->response($genre);
    }

    public function updateGenre($req, $res) {
        $id = $req->params->id;
        $genre = $this->model->getGenre($id);

        if(!$genre) {
            return $this->view->response('El género con el id = ' . $id . ' no existe', 404);
        }
        if(empty($req->body->nombre)) {
            return $this->view->response('Faltan completar datos', 400);
        }

        $name = $req->body->nombre;

        $this->model->updateGenre($name, $id);

        $updatedGenre = $this->model->getGenre($id);
        $this->view->response($updatedGenre);
    }

    public function createGenre($req, $res) {
        if(empty($req->body->nombre)) {
            return $this->view->response('Faltan completar datos', 400);
        }
        
        $name = $req->body->nombre;

        $id = $this->model->createGenre($name);

        if(!$id) {
            return $this->view->response('Error al crear el genero', 500);
        }
        
        $genre = $this->model->getGenre($id);

        return $this->view->response($genre, 201);
    }
}