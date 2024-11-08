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
        $sortBooksBy = isset($req->queryParams['sortBooksBy']) ? $req->queryParams['sortBooksBy'] : 'nombre';
        $orderBooks = isset($req->queryParams['orderBooks']) ? strtoupper($req->queryParams['orderBooks']) : 'ASC';

        if ($orderBooks !== 'ASC' && $orderBooks !== 'DESC') {
            return $this->view->response('El parámetro "order" debe ser "ASC" o "DESC"', 400);
        }

        if ($sortBooksBy !== 'nombre' && $sortBooksBy !== 'autor' && $sortBooksBy !== 'editorial' && $sortBooksBy !== 'genero' && $sortBooksBy !== 'ID_genero' && $sortBooksBy !== 'ID_genero2' && $sortBooksBy !== 'ID_genero3' && $sortBooksBy !== 'stock') {
            return $this->view->response('Parámetro equivocado', 400);
        }

        $books = $this->model->getBooks($sortBooksBy, $orderBooks);

        $sortGenresBy = isset($req->queryParams['sortGenresBy']) ? $req->queryParams['sortGenresBy'] : 'nombre';
        $orderGenres = isset($req->queryParams['orderGenres']) ? strtoupper($req->queryParams['orderGenres']) : 'ASC';

        if ($orderGenres !== 'ASC' && $orderGenres !== 'DESC') {
            return $this->view->response('El parámetro "order" debe ser "ASC" o "DESC"', 400);
        }

        if ($sortGenresBy !== 'nombre') {
            return $this->view->response('Parámetro equivocado', 400);
        }

        $genres = $this->model->getGenres($sortGenresBy, $orderGenres);

        return $this->view->response($books, null, $genres);
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

        $this->model->updateGenre($name);

        $updatedGenre = $this->model->getGenre($id);
        $this->view->response($updatedGenre);
    }
}