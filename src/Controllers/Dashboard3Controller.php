<?php 
namespace Handmade\Controllers;
use DunnServer\MVC\Controller;
use Handmade\Models\TutorialsDatabase;
class Dashboard3Controller extends Controller
{
    function doGet($req, $res)
    {
        $tdb=new TutorialsDatabase();
        $tutorials=$tdb->getAll();
        $res->send($tutorials);
    }
}