<?php 

namespace Handmade\Router;

use DunnServer\Router\Router;
use Handmade\Controllers\AddPController;
use Handmade\Controllers\DeletePController;
use Handmade\Controllers\ProductController;
use Handmade\Controllers\UpdatePController;
use Handmade\Middleware\AuthFilter;
use Handmade\Middleware\CustomUploadFilter;

class ProductRouter extends Router {
    function __construct()
    {
        parent::__construct("/product");
        $this->addRoute("", new ProductController());
        $this->addRoute("/add", new AddPController());
        $this->addRoute("/update/{id}", new UpdatePController());
        $this->addRoute("/delete/{id}", new DeletePController());

        $this->addFilter('/*', new AuthFilter(), new CustomUploadFilter('/upload'));
    }
}