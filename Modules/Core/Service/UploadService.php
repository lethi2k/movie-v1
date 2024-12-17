<?php

namespace Modules\Core\Service;

use Illuminate\Support\Facades\Storage;

class UploadService
{
    public function uploadImage($file, $path = '')
    {
        $imgPath = $file->store(sprintf('public/images/product%s', empty($path) ? '' : '/' . $path));

        return ['image_url' => Storage::url($imgPath)];
    }
}
