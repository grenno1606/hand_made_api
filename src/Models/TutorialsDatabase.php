<?php 
namespace Handmade\Models;
use Handmade\Utils\Database;
class TutorialsDatabase
{
    static function getAll()
    {
        $db= Database::connect();
        $data=$db->select("SELECT * FROM tutorials");
        return $data;
    }
    static function getById($id)
    {
        $db= Database::connect();
        $data=$db->selectOne("SELECT * FROM tutorials WHERE tutorialid=?",[$id]);
        return $data;
    }
    static function add($tutorial)
    {
        $db= Database::connect();
        $db->insert("INSERT INTO tutorials(tutorialid,tutorialname,video) VALUES (?,?,?)",[$tutorial->getTutorialId(),$tutorial->getTutorialName(),$tutorial->getVideo()]);
    }
    static function update($tutorial)
    {
        $db= Database::connect();
        $db->update("UPDATE tutorials SET tutorialname=?,video=? WHERE tutorialid=?",[$tutorial->getTutorialName(),$tutorial->getVideo(),$tutorial->getTutorialId()]);
    }
    static function delete($id)
    {
        $db= Database::connect();
        $db->delete("DELETE FROM tutorials WHERE tutorialid=?",[$id]);
    }
}