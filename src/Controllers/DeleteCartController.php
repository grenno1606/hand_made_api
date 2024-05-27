<?php 
namespace Handmade\Controllers;
use DunnServer\MVC\Controller;
use Handmade\Models\ProductsDatabase;
use Handmade\Models\UserCartDatabase;
class DeleteCartController extends Controller
{
    function doPost($req, $res)
    {
        $pdb=new ProductsDatabase();
        $ucdb=new UserCartDatabase();
        $id=$req->getParams("productId");
        $postRes = $pdb->getById($id);
        $ucdb->delete($id);
        $res->send($postRes);
    }
}