<?php
class CatalogueModel {
    private $db;

    public function __construct() {
        $this->db = new PDO('mysql:host=localhost;dbname=tpe-web-2;charset=utf8', 'root', '');
    }

    public function getBooks($sortBooksBy, $orderBooks, $filterBooksBy = null, $valueBook = null) {
        $sql = 'SELECT * FROM libro';

        if($filterBooksBy && $valueBook) {
            $sql .= ' WHERE ' . $filterBooksBy . ' = ?' ; 
        }

        $sql .=  ' ORDER BY ' . $sortBooksBy . ' ' . $orderBooks;

        $query = $this->db->prepare($sql);
        if($filterBooksBy && $valueBook) {
            $query->execute([$valueBook]);
        } else {
            $query->execute();
        }

        $books = $query->fetchAll(PDO::FETCH_OBJ);

        return $books;
    }

    public function getGenres($sortGenresBy, $orderGenres, $filterGenresBy, $valueGenre) {
        $sql = 'SELECT * FROM géneros';

        if($filterGenresBy && $valueGenre) {
            $sql .= ' WHERE ' . $filterGenresBy . ' = ?' ; 
        }

        $sql .= ' ORDER BY ' . $sortGenresBy . ' ' . $orderGenres;

        $query = $this->db->prepare($sql);
        if($filterGenresBy && $valueGenre) {
            $query->execute([$valueGenre]);
        } else {
            $query->execute();
        }

        $genres = $query->fetchAll(PDO::FETCH_OBJ);

        return $genres;
    }

    public function getBook($id) {
        $query = $this->db->prepare('SELECT * FROM libro WHERE id = ?');
        $query->execute([$id]);

        $book = $query->fetch(PDO::FETCH_OBJ);

        return $book;
    }

    public function updateBook($name, $author, $editorial, $genre, $idGenre, $idGenre2, $idGenre3, $stock, $id) {
        $query = $this->db->prepare('UPDATE libro SET nombre = ?, autor = ?, editorial = ?, genero = ?, ID_genero = ?, ID_genero2 = ?, ID_genero3 = ?, stock = ? WHERE id = ?');
        $query->execute([$name, $author, $editorial, $genre, $idGenre, $idGenre2, $idGenre3, $stock, $id]);

        $id = $this->db->lastInsertId();
        
        return $id;
    }

    public function createBook($name, $author, $editorial, $genre, $idGenre, $idGenre2, $idGenre3, $stock) {
        $query = $this->db->prepare('INSERT INTO libro(nombre, autor, editorial, genero, ID_genero, ID_genero2, ID_genero3, stock) VALUES (?, ?, ?, ?, ?, ?, ?, ?)');
        $query->execute([$name, $author, $editorial, $genre, $idGenre, $idGenre2, $idGenre3, $stock]);

        $id = $this->db->lastInsertId();

        return $id;
    }

    public function getGenre($id) {
        $query = $this->db->prepare('SELECT * FROM géneros WHERE id = ?');
        $query->execute([$id]);

        $genre = $query->fetch(PDO::FETCH_OBJ);

        return $genre;
    }

    public function updateGenre($name, $id) {
        $query = $this->db->prepare('UPDATE géneros SET nombre = ? WHERE id = ?');
        $query->execute([$name, $id]);

        $id = $this->db->lastInsertId();

        return $id;
    }

    public function createGenre($name) {
        $query = $this->db->prepare('INSERT INTO géneros(nombre) VALUES (?)');
        $query->execute([$name]);

        $id = $this->db->lastInsertId();

        return $id;
    }
}