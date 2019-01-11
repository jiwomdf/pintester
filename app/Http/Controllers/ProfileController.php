<?php

namespace App\Http\Controllers;

use App\User;
use App\Category;
use App\TrCategory;
use Auth;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    //
    public function profile()
    {
        $profile = User::findOrFail(Auth::user()->id);

        return view('profile', compact('profile'));
    }

    public function categories()
    {
        $profile = User::findOrFail(Auth::user()->id);
        $category = Category::all();
        $choosenCategory = TrCategory::select('category_id','categories.name')->join('categories','category_id','=','categories.id')->where('user_id','like',Auth::user()->id)->get();

        $data = compact('category', 'choosenCategory');

        return view('categories', compact('profile'), compact('data'));
    }

    public function doUpdateProfile(Request $request)
    {
        $profile = User::find(Auth::user()->id);
        $profile->id = Auth::user()->id;
        $profile->name = $request->name;
        $profile->email = $request->email;
        $profile->password = $request->password;
        $profile->gender = $request->gender;
        $profile->save();
        return back();
    }

    public function doChooseCategory(Request $request)
    {
        // //save untuk trCategory
        // $TrCategory = new TrCategory();
        // //$photos->id = $request->user_id;
        // $TrCategory->user_id = Auth::user()->id;
        // $TrCategory->category_id = $request->category;
        // $TrCategory->save();

    }

    public function returnCategory($id)
    {   
        //$choosenCategory = TrCategory::select('category_id','categories.name')->join('categories','category_id','=','categories.id')->where('user_id','like',Auth::user()->id)->get();
        // $hasntChoosent = false;

        // foreach($choosenCategory as $c1)
        // {
        //     if($c1->id == $id)
        //     {
        //         $hasntChoosent = false;
        //         break;
        //     }
        //     else
        //     {
        //         $hasntChoosent = true;
        //     }
        // }       
        
        // if($hasntChoosent)
        // {
            
            //save untuk trCategory
            $TrCategory = new TrCategory();
            //$photos->id = $request->user_id;
            $TrCategory->user_id = Auth::user()->id;
            $TrCategory->category_id = $id;
            $TrCategory->save();
            
        // }

        $profile = User::findOrFail(Auth::user()->id);
        $category = Category::all();

        $choosenCategory = TrCategory::select('category_id','categories.name')->join('categories','category_id','=','categories.id')->where('user_id','like',Auth::user()->id)->get();

        $data = compact('category', 'choosenCategory');

        return view('categories', compact('profile'), compact('data'));
    }

    public function doDetailUser($id)
    {
        $profile = User::findOrFail($id);
        $category = Category::all();

        return view('detailuser', compact('profile'), compact('category'));
    }

    public function doChangeUser(Request $request)
    {
        if($request->btn == 1)
        {
            $profile = User::findOrFail($request->id);
            $category = Category::all();

            return view('detailuser', compact('category'), compact('profile'));
        }
        elseif($request->btn == 2)
        {
            $profile = User::find($request['id']);

            //$profile->id = $request->id;
            $profile->name = $request['name'];
            $profile->email = $request['email'];
            //$profile->password = $request['password'];
            $profile->gender = $request['gender'];
            $profile->save();

            $profile = User::findOrFail($request['id']);
            $category = Category::all();

            return view('detailuser', compact('category'), compact('profile'));
        }
        else
        {
            //delete
        }

        
        
    }
}
