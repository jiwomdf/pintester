<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MsPhoto;
use App\User;
use Illuminate\Support\Facades\Validator;


class PhotoController extends Controller
{
    //
    public function MyPost($id)
    {
        $photos = MsPhoto::where('user_id','LIKE',$id)->paginate(10);
        //dd($photos);
        return view('MyPost',compact('photos'));
    }

    public function InsertPhoto()
    {
        $user = User::all();
        return view('InsertPhoto', compact('user'));
    }

    public function PostDetail($id)
    {
        //$photos = MsPhoto::where('id','LIKE',$id);
        $ids = (string)$id;
        $photos = MsPhoto::findOrFail($ids)->paginate(1);

        //$photos = (string)$temp;
        //dd($photos);
        return view('PostDetail', compact('photos'));
    }

    public function doInsertPhoto(Request $request)
    {
        $message = [
            'user_id.required' => 'Di isi ya bang',
            'title.required' => 'Di isi ya bang',
            'caption.required' => 'Di isi ya bang',
            'image.required' => 'Di isi ya bang',
            'price.required' => 'Di isi ya bang',
            'category.required' => 'Di isi ya bang',
        ];

        //Validasi
        $validator = Validator::make($request->all(),[
            'user_id' => 'required',
            'title' => 'required',
            'caption' => 'required',
            'image' => 'required|mimes:jpeg,png,gif',
            'price' => 'required',
            'category' => 'required',
        ],$message);

        if($validator->fails())
        {
            echo 'error';
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
        //$photos->id = $request->user_id;
        $photos->title = $request->title;
        $photos->caption = $request->caption;
        //harus di substring
        $photos->image = 'MsPhoto/'.$file->getClientOriginalName();
        $photos->price = $request->price;
        $photos->category = $request->category;
        $photos->user_id = $request->user_id;

       // dd($photos);

        $photos->save();
        
        
        $photos = MsPhoto::where('user_id','LIKE',$id)->paginate(10);
        //dd($photos);
        return view('MyPost',compact('photos'));
    }
}
