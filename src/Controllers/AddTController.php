<?php 
namespace Handmade\controllers;
use DunnServer\MVC\Controller;
use DunnServer\Utils\DunnArray;
use Handmade\Models\Tutorials;
use Handmade\Models\TutorialsDatabase;
class AddTController extends Controller
{
    function doPost($req, $res)
    {
        $tdb=new TutorialsDatabase();
        $tutorial['tutorialId']=uniqid();
        $tutorial['tutorialName']=$req->getBody('tutorialname');
      
        $upload = $req->getUploads();
        $video = $upload->get('video', new DunnArray())->get(0);
        $root = $req->server('HTTP_HOST');
        if ($video && $video->getError() == 0) {
            $path = "http://$root" . $video->getPath();
            $tutorial['video'] = $video->getPath();
            $tdb->add(Tutorials::fromArray($tutorial));
            $tutorial['video'] = $path;
            $res->send([
                'tutorial' => $tutorial,
                'error' => null
            ]);
        } else {
            $res->status(400)->send([
                'tutorial' => null,
                'error' => 'No video uploaded or upload failed'
            ]);
        }

    }
}