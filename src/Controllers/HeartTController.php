<?php 
namespace Handmade\Controllers;
use DunnServer\MVC\Controller;
use Handmade\Models\FavoriteTutorialsDatabase;
use Handmade\Models\TutorialsDatabase;

class HeartTController extends Controller
{
    function doGet($req, $res)
    {
        $tdb=new TutorialsDatabase();
        $ftdb=new FavoriteTutorialsDatabase();
      
        $fts=$ftdb->getAll();
        $tutorials=[];
        $user = $req->getParams('user');
        for ($i= 0;$i<count($fts);$i++){
            $ft=$fts[$i];
            if ($ft['username']==$user["username"]) {
            $id=$ft["tutorialid"];
            $tutorial=$tdb->getById($id);
            $tutorials[]=$tutorial;
            }
        }
        $res->send($tutorials);
    }
}