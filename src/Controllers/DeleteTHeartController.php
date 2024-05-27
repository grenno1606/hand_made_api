<?php 
namespace Handmade\controllers;
use DunnServer\MVC\Controller;
use Handmade\Models\FavoriteTutorialsDatabase;
use Handmade\Models\TutorialsDatabase;

class DeleteTHeartController extends Controller
{
    function doPost($req, $res)
    {
        $tdb=new TutorialsDatabase();
        $ftdb=new FavoriteTutorialsDatabase();
        $id=$req->getParams("tutorialId");
        $postRes = $tdb->getById($id);
        $ftdb->delete($id);
        $res->send($postRes);
    }
}