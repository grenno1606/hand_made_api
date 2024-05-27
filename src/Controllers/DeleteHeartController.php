<?php 
namespace Handmade\Controllers;
use DunnServer\MVC\Controller;
use Handmade\Models\FavoriteProductsDatabase;
use Handmade\Models\ProductsDatabase;

class DeleteHeartController extends Controller
{
    function doPost($req, $res)
    {
        $pdb=new ProductsDatabase();
        $fpdb=new FavoriteProductsDatabase();
        $id=$req->getParams("productId");
        $postRes = $pdb->getById($id);
        $fpdb->delete($id);
        $res->send($postRes);
    }
}