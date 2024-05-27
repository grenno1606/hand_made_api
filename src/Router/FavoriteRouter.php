<?php 

namespace Handmade\Router;

use DunnServer\Router\Router;
use Handmade\Controllers\AddHeartController;
use Handmade\Controllers\AddTHeartController;
use Handmade\Controllers\DeleteHeartController;
use Handmade\Controllers\DeleteTHeartController;
use Handmade\Middleware\AuthFilter;

class FavoriteRouter extends Router {
    function __construct()
    {
        parent::__construct("/favorite");

        $this->addRoute('/add/{productId}', new AddHeartController());
        $this->addFilter('/*', new AuthFilter());
        $this->addRoute('/addtutorial/{tutorialId}', new AddTHeartController());
        $this->addRoute('/delete/{productId}', new DeleteHeartController());
        $this->addRoute('/deletetutorial/{tutorialId}', new DeleteTHeartController());
    }
}