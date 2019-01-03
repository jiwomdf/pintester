<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MsPhoto;
use App\MsComment;
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
        $photos = MsPhoto::select('MsPhoto.id','title','caption','image','price','category','Users.Name')->join('Users','user_id','=','user_id')->where('user_id','LIKE',$id)->get();
        //get semua comment pada detail photo tersebut
        $comment = MsComment::select('comment','user_id','photo_id','Users.pp','Users.Name')->join('Users','user_id','=','user_id')->where('photo_id', '=', '1')->get();
   
        return view('PostDetail', compact('photos'), compact('comment'));
    }

    public function doInsertPhoto(Request $request)
    {
        $message = [
            'user_id.required' => '',
            'title.required' => 'please input the title',
            'caption.required' => 'please input the caption',
            'image.required' => 'please upload an image',
            'price.required' => 'please input the price',
            'category.required' => 'please input the category',
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
        $photos->image = $file->getClientOriginalName();
        $photos->price = $request->price;
        $photos->category = $request->category;
        $photos->user_id = $request->user_id;

       // dd($photos);

        $photos->save();
        
        
        $photos = MsPhoto::where('user_id','LIKE',$id)->paginate(10);
        //dd($photos);
        return view('MyPost',compact('photos'));
    }

    public function Comment(Request $request)
    {
        if($request->Comment == null)
        {
            $comments = new MsComment();
            $comments->comment = $request->comment;
            $comments->photo_id = $request->photo_id;
            $comments->user_id = $request->user_id;
            $comments->save();
        }
        else
        {
            $message = [
                'comment.required' => 'please input the comment',
            ];
        }

        return back();
    }
}
