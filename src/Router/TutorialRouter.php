<?php 

namespace Handmade\Router;

use DunnServer\Router\Router;
use Handmade\Controllers\AddTController;
use Handmade\Controllers\DeleteTController;
use Handmade\Controllers\TutorialController;
use Handmade\Controllers\UpdateTController;
use Handmade\Middleware\AuthFilter;
use Handmade\Middleware\CustomUploadVideoFilter;

class TutorialRouter extends Router {
    function __construct()
    {
        parent::__construct("/tutorial");
        $this->addRoute('', new TutorialController());
        $this->addRoute('/add', new AddTController());
        $this->addRoute('/update/{id}', new UpdateTController());
        $this->addRoute('/delete/{id}', new DeleteTController());
        $this->addFilter('/*', new AuthFilter(), new CustomUploadVideoFilter('/upload'));
    }
}
?>