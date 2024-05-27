<?php 
namespace Handmade\controllers;
use DunnServer\MVC\Controller;
use DunnServer\Utils\DunnArray;
use Handmade\Models\Products;
use Handmade\Models\ProductsDatabase;

class UpdatePController extends Controller
{
    function doGet($req, $res)
    {
        $pdb=new ProductsDatabase();
        $id=$req->getParams("id");
        $product=$pdb->getById($id);
        $res->send($product);
    }
    function doPost($req, $res)
    {
        $pdb=new ProductsDatabase();
        $id=$req->getParams('id');
        $product = $pdb->getById($id);    //sua
        $product['productId']=$id;
        $product['productName']=$req->getBody('productname');
        $product['originalPrice']=$req->getBody('original_price');
        $product['discountPercentage']=$req->getBody('discount_percentage');
        $product['discountedPrice']=$req->getBody('discounted_price');
        // $imgs=$pdb->getById($id);
        // $uploads=$req->getUploads();
        // $image=$uploads->get('image',new DunnArray());
        // $img=$image->get(0);
        // if($img->getError() == 0) $product['image']=$img->getPath();
        // else $product['image']=$imgs['image']; 

        $upload = $req->getUploads();
        $img = $upload->get('image', new DunnArray())->get(0);
        $root = $req->server('HTTP_HOST');
        if ($img && $img->getError() == 0) {
            $product['image'] = $img->getPath();
        } else {
            $product['image'] = $product['image'];
        }
        $pdb->update(Products::fromArray($product));
        $postRes = $pdb->getById($id);
        $postRes['image'] = "http://$root" . $postRes['image'];
        $res->send($postRes);
    }
}