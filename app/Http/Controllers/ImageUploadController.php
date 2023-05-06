<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ImageUploadRequest;

class ImageUploadController extends Controller
{
    //

    public function index()
    {
        return view('image-upload.index');
    }

    public function upload(ImageUploadRequest $request)
    {
        dd($request->image);
        $filename = time() . '.' . $request->image->extension();

        $request->image->move(public_path('images'), $filename);

        // save uploaded image filename here to your database

        return back()
            ->with('success','Image uploaded successfully.')
            ->with('image', $filename);
    }
}
