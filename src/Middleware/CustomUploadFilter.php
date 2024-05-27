<?php 
namespace Handmade\Middleware;
use DunnServer\Middlewares\HandleFileFilter;
use Exception;

class CustomUploadFilter extends HandleFileFilter
{
    function __construct($dir = null)
    {
        parent::__construct($_SERVER['DOCUMENT_ROOT'].$dir,$dir);
    }

    function doFilter($req, $res, $chain)
    {
        $upload = $req->getUploads();
        $isImage = true;
        // Validate file types
        $upload->values()->forEach(function ($files) use (&$isImage) {
            $files->forEach(function ($file) use (&$isImage) {
                if ($file->getType() !== 'image/png' && $file->getType() !== 'image/jpeg' && $file->getType("image/*") !== 'image/*') {
                    $isImage = false;
                    return;
                }
            });
        });
        if (!$isImage) {
            $exception = new Exception('Only images are allowed', 400);
            $res->status($exception->getCode())->send($exception);
            return;
        }

        return parent::doFilter($req, $res, $chain);
    }
}