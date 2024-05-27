<?php 
namespace Handmade\controllers;
use DunnServer\MVC\Controller;
use DunnServer\Utils\DunnArray;
use Handmade\Models\Tutorials;
use Handmade\Models\TutorialsDatabase;

class UpdateTController extends Controller
{
    function doGet($req, $res)
    {
        $tdb=new TutorialsDatabase();
        // $view=$res->getView("UpdateTutorialView");
        $id=$req->getParams("id");
        $tutorial=$tdb->getById($id);
        // $view->set('tutorial',$tutorial);
        $res->send($tutorial);
    }
    function doPost($req, $res)
    {
        $tdb=new TutorialsDatabase();
        $id=$req->getParams('id');
        $tutorial['tutorialId']=$id;
        $tutorial['tutorialName']=$req->getBody('tutorialname');
        // $vids=$tdb->getById($id);
        // $uploads=$req->getUploads();
        // $videos=$uploads->get('video',new DunnArray());
        // $video=$videos->get(0);
        // if ($video->getError()==0) $tutorial['video']=$video->getPath();
        // else $tutorial['video']=$vids['video'];


        // Handle video upload
        // $upload = $req->getUploads();
        // $video = $upload->get('video', new DunnArray())->get(0);
        // $root = $req->server('HTTP_HOST');
        // if ($video && $video->getError() == 0) {
        //     $path = "http://$root" . $video->getPath();
        //     $tutorial['video'] = $path;
        //     $tdb->add(Tutorials::fromArray($tutorial));
        //     $res->send([
        //         'tutorial' => $tutorial,
        //         'error' => null
        //     ]);
        // } else {
        //     $res->status(400)->send([
        //         'tutorial' => null,
        //         'error' => 'No video uploaded or upload failed'
        //     ]);
        // }

        $tutorial['video'] = "";
        $tdb->update(Tutorials::fromArray($tutorial));
        $postRes = $tdb->getById($id);
        $res->send($postRes);
    }
}