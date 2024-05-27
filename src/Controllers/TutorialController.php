<?php 
namespace Handmade\controllers;
use DunnServer\MVC\Controller;
use Handmade\Models\TutorialsDatabase;
class TutorialController extends Controller
{
    function doGet($req, $res)
    {
        $tdb= new TutorialsDatabase();
        $tutorials=$tdb->getAll();
        $res->send($tutorials);
    }
}