<?php 
namespace Handmade\Models;
use Handmade\Utils\Database;
class FavoriteTutorialsDatabase
{
    static function getAll()
    {
        $db= Database::connect();
        $data=$db->select("SELECT * FROM favoritetutorials");
        return $data;
    }
    static function getById($id)
    {
        $db= Database::connect();
        $data=$db->selectOne("SELECT * FROM favoritetutorials WHERE favoriteid=?",[$id]);
        return $data;
    }
    static function add($tutorial)
    {
        $db= Database::connect();
        $db->insert("INSERT INTO favoritetutorials(username,tutorialid) VALUES (?,?)",[$tutorial->getUserName(),$tutorial->getTutorialId()]);
    }
    // static function update($product)
    // {
    //     $db= Database::connect();
    //     $db->update("UPDATE favoriteproducts SET quantity=? WHERE productid=?",[$product->getQuantity(),$product->getProductId()]);
    // }
    static function delete($id)
    {
        $db= Database::connect();
        $db->delete("DELETE FROM favoritetutorials WHERE tutorialid=?",[$id]);
    }
}