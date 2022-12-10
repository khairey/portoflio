<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class AboutController extends Controller
{
    public function edit_about()
    {
        return About::orderBy('id', 'desc')->first();
    }
    public function update_about(Request $request, $id)
    {
        $about = About::find($id);
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required'
        ]); 
        if ($about->photo != $request->photo) {
            $strpos = strpos($request->photo, ';');
            $sub = substr($request->photo, 0, $strpos);
            $ex = explode('/', $sub)[1];
            $name = time() . '.' . $ex;
            $img = Image::make($request->photo)->resize(700,500);
            $upload_path = storage_path()."/app/public/";
            $image=$upload_path.$about->photo;
            $img->save($upload_path.$name);            
        } 
        $about->name = $request->name;
        $about->email = $request->email;
        $about->phone = $request->phone;
        $about->address = $request->address;
        $about->description = $request->description;
        $about->tagline = $request->tagline;
        $about->photo = $name; 
        $about->save();

        return response()->json($name, 200);
    }
}
