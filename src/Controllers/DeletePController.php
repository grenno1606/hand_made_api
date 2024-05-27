<?php 
namespace Handmade\Controllers;
use DunnServer\MVC\Controller;
use Handmade\Models\ProductsDatabase;
class DeletePController extends Controller
{
    function doPost($req, $res)
    {
        $pdb=new ProductsDatabase();
        $id=$req->getParams("id");
        $delete=$pdb->getById($id);
        $pdb->delete($id);
        $res->send($delete);
    }
}