<?php 
namespace Handmade\Controllers;
use DunnServer\MVC\Controller;
use Handmade\Models\TutorialsDatabase;
class DeleteTController extends Controller
{
    function doPost($req, $res)
    {
        $tdb=new TutorialsDatabase();
        $id=$req->getParams("id");
        $delete=$tdb->getById($id);
        $tdb->delete($id);
        $res->send($delete);
    }
}