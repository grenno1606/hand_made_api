<?php 
namespace Handmade\Controllers;
use DunnServer\MVC\Controller;
use Handmade\Models\FavoriteTutorials;
use Handmade\Models\FavoriteTutorialsDatabase;
use Handmade\Models\TutorialsDatabase;

class AddTHeartController extends Controller
{
    function doPost($req, $res)
    {
        $tdb=new TutorialsDatabase();
        $ftdb=new FavoriteTutorialsDatabase();
        $user = $req->getParams('user');
        $heart['tutorialId']=$req->getParams('tutorialId');
        $heart['userName']=$user["username"];
        $ftdb->add(FavoriteTutorials::fromArray($heart));
        $postRes = $tdb->getById($heart['tutorialId']);
        $res->send($postRes);
    }
}