<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MsPhoto;
use Illuminate\Support\Facades\Validator;


class Photo extends Controller
{
    //
    public function MyPost()
    {
        $photos = MsPhoto::paginate(10);
        //dd($photos);
        return view('MyPost',compact('photos'));
    }

    public function InsertPhoto()
    {
        return view('InsertPhoto');
    }

    public function doInsert(Request $request)
    {
        $message = [
            'title.required' => 'Di isi ya bang',
            'caption.required' => 'Di isi ya bang',
            'image.required' => 'Di isi ya bang',
            'price.required' => 'Di isi ya bang',
            'category.required' => 'Di isi ya bang',
        ];

        //Validasi
        $validator = Validator::make($request->all(),[
            'title' => 'required',
            'caption' => 'required',
            'image' => 'required|mimes:jpeg,png,gif',
            'price' => 'required',
            'category' => 'required',
        ],$message);

        if($validator->fails())
        {
            return back()->withErrors($validator);
        }

        //move folder
        if($request->hasFile('image'))
        {
            $file = $request->image;
            $filename = $file->getClientOriginalName();
            $file->move('MsPhoto/',$filename);
        }

        $photos = new MsPhoto();
        // $photos->id = 2;
        $photos->title = $request->title;
        $photos->caption = $request->caption;
        //harus di substring
        $photos->image = 'MsPhoto/'.$file->getClientOriginalName();
        $photos->price = $request->price;
        $photos->category = $request->category;
        $photos->save();
        
        $photos = MsPhoto::paginate(10);
        return view('MyPost',compact('photos'));
    }
}
