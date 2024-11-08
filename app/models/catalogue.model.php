<?php
class CatalogueModel {
    private $db;

    public function __construct() {
        $this->db = new PDO('mysql:host=localhost;dbname=tpe-web-2;charset=utf8', 'root', '');
    }

    public function getBooks($sortBooksBy, $orderBooks) {
        $validSortFields = ['nombre', 'autor', 'editorial', 'genero', 'ID_genero', 'ID_genero2', 'ID_genero3', 'stock'];
        $validOrders = ['ASC', 'DESC'];

        if (!in_array($sortBooksBy, $validSortFields)) {
            $sortBooksBy = 'nombre';
        }

        if (!in_array($orderBooks, $validOrders)) {
            $orderBooks = 'ASC';
        }

        $sql = 'SELECT * FROM libro ORDER BY ' . $sortBooksBy . ' ' . $orderBooks;

        $query = $this->db->prepare($sql);
        $query->execute();

        $books = $query->fetchAll(PDO::FETCH_OBJ);

        return $books;
    }

    public function getGenres($sortGenresBy, $orderGenres) {
        $validSortFields = ['nombre'];
        $validOrders = ['ASC', 'DESC'];

        if (!in_array($sortGenresBy, $validSortFields)) {
            $sortGenresBy = 'nombre';
        }

        if (!in_array($orderGenres, $validOrders)) {
            $orderGenres = 'ASC';
        }

        $sql = 'SELECT * FROM géneros ORDER BY ' . $sortGenresBy . ' ' . $orderGenres;

        $query = $this->db->prepare($sql);
        $query->execute();

        $genres = $query->fetchAll(PDO::FETCH_OBJ);

        return $genres;
    }

    public function updateBook($name, $author, $editorial, $genre, $idGenre, $idGenre2, $idGenre3, $stock, $id) {
        $query = $this->db->prepare('UPDATE libro SET nombre = ?, autor = ?, editorial = ?, genero = ?, ID_genero = ?, ID_genero2 = ?, ID_genero3 = ?, stock = ? WHERE id = ?');
        $query->execute([$name, $author, $editorial, $genre, $idGenre, $idGenre2, $idGenre3, $stock, $id]);

        $id = $this->db->lastInsertId();
        
        return $id;
    }

    public function updateGenre($name) {
        $query = $this->db->prepare('UPDATE géneros SET nombre = ?');
        $query->execute([$name]);

        $id = $this->db->lastInsertId();

        return $id;
    }
}