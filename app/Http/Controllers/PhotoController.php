<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MsPhoto;
use App\MsComment;
use App\User;
use App\Category;
use App\TrCategory;
use Auth;
use Illuminate\Support\Facades\Validator;


class PhotoController extends Controller
{
    //foto di profile dia
    public function MyPost($id)
    {
        $photos = MsPhoto::where('user_id','LIKE',$id)->paginate(10);
        //$photos = $photoss[$ids];
        //dd($photos);
        return view('MyPost',compact('photos'));
    }

    //untuk view menu insert photo
    public function InsertPhoto()
    {
        $user = User::all();
        $category = Category::all();
        return view('InsertPhoto', compact('user'), compact('category'));
    }

    //untuk liat detail post
    public function PostDetail($id)
    {
        //$photos = MsPhoto::where('id','LIKE',$id);
        //$ids = (string)$id;
        $photos = MsPhoto::select('MsPhoto.id','title','caption','image','price','category','Users.Name','user_id')->join('Users','Users.id','=','user_id')->where('MsPhoto.id','LIKE',$id)->get();
        // dd($photoss);
        // $photos = $photoss[$id];

        
        //get semua comment pada detail photo tersebut
        $comment = MsComment::select('comment','MsComments.user_id','photo_id','Users.pp','Users.Name')->join('Users','Users.id','=','user_id')->join('MsPhoto','MsPhoto.id','=','photo_id')->where('photo_id', '=', $id)->get();

        return view('PostDetail', compact('photos'), compact('comment'));
    }

    //untuk insert photo
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

        //save untuk photo
        $photos = new MsPhoto();
        //$photos->id = $request->user_id;
        $photos->title = $request->title;
        $photos->caption = $request->caption;
        //harus di substring
        $photos->image = $file->getClientOriginalName();
        $photos->price = $request->price;

        $Category = Category::find($request->category);

        $photos->category = $Category->name;
        $photos->user_id = $request->user_id;

        $photos->save();
 

        $photos = MsPhoto::where('user_id','LIKE',Auth::user()->id)->paginate(10);
        //dd($photos);
        return view('MyPost',compact('photos'));
    }

    //untuk comment
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

        return view('MyPost',compact('photos'));
    }


    //untuk delete photo
    public function Delete(Request $request)
    {
        MsPhoto::destroy($request->delId);
    
        $photos = MsPhoto::where('user_id','LIKE',$request->id)->paginate(10);
        return view('MyPost',compact('photos'));

    }
}
