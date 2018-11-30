<?php

namespace App\Traits;

use Illuminate\Http\Request;

trait FileUpload
{
    public function upload(Request $request, $inputName = 'file')
    {
        $path = $request->file($inputName)->store('public/uploads');
        $url = str_replace('public/', '/storage/', $path);

        return $url;
    }
}
