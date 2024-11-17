<?php
    
    require_once 'libs/router.php';
    require_once 'app/controllers/catalogue.api.controller.php';

    $router = new Router();

    #                 endpoint        verbo     controller             metodo
    $router->addRoute('catalogue'      , 'GET',     'CatalogueApiController',   'getCatalogue');
    $router->addRoute('book/:id'      , 'GET',     'CatalogueApiController',   'getBook');
    $router->addRoute('book/:id'      , 'PUT',     'CatalogueApiController',   'updateBook');
    $router->addRoute('book'      , 'POST',     'CatalogueApiController',   'createBook');
    $router->addRoute('genre/:id'      , 'GET',     'CatalogueApiController',   'getGenre');
    $router->addRoute('genre/:id'      , 'PUT',     'CatalogueApiController',   'updateGenre');
    $router->addRoute('genre'      , 'POST',     'CatalogueApiController',   'createGenre');


    $router->route($_GET['resource'], $_SERVER['REQUEST_METHOD']);