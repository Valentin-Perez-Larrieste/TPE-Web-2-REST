<?php
    
    require_once 'libs/router.php';
    require_once 'app/controllers/catalogue.api.controller.php';

    $router = new Router();

    #                 endpoint        verbo     controller             metodo
    $router->addRoute('catalogue'      , 'GET',     'CatalogueApiController',   'getCatalogue');
    $router->addRoute('book/:id'      , 'PUT',     'CatalogueApiController',   'updateBook');
    $router->addRoute('genre/:id'      , 'PUT',     'CatalogueApiController',   'updateGenre');


    $router->route($_GET['resource'], $_SERVER['REQUEST_METHOD']);