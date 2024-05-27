<?php
namespace Handmade\Middleware;
use DunnServer\Middlewares\HandleFileFilter;
use Exception;

class CustomUploadVideoFilter extends HandleFileFilter {
    function __construct($dir = null)
    {
        parent::__construct($_SERVER['DOCUMENT_ROOT'] . $dir, $dir);
    }

    function doFilter($req, $res, $chain)
    {
        $upload = $req->getUploads();
        $isVideo = true;
        // Validate file types
        $upload->values()->forEach(function ($files) use (&$isVideo) {
            $files->forEach(function ($file) use (&$isVideo) {
                if ($file->getType() !== 'video/mp4' && $file->getType() !== 'video/avi') {
                    $isVideo = false;
                    return;
                }
            });
        });
        if (!$isVideo) {
            $exception = new Exception('Only videos are allowed', 400);
            $res->status($exception->getCode())->send($exception);
            return;
        }

        return parent::doFilter($req, $res, $chain);
    }
}
