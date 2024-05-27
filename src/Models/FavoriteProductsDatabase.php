<?php 
namespace Handmade\Models;
use Handmade\Utils\Database;
class FavoriteProductsDatabase
{
    static function getAll()
    {
        $db= Database::connect();
        $data=$db->select("SELECT * FROM favoriteproducts");
        return $data;
    }
    static function getById($id)
    {
        $db= Database::connect();
        $data=$db->selectOne("SELECT * FROM favoriteproducts WHERE favoriteid=?",[$id]);
        return $data;
    }
    static function add($product)
    {
        $db= Database::connect();
        $db->insert("INSERT INTO favoriteproducts(username,productid) VALUES (?,?)",[$product->getUserName(),$product->getProductId()]);
    }
    // static function update($product)
    // {
    //     $db= Database::connect();
    //     $db->update("UPDATE favoriteproducts SET quantity=? WHERE productid=?",[$product->getQuantity(),$product->getProductId()]);
    // }
    static function delete($id)
    {
        $db= Database::connect();
        $db->delete("DELETE FROM favoriteproducts WHERE productid=?",[$id]);
    }
}