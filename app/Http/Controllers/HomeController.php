<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\category;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function insertcat()
    {
        return view('categoryins');
    }

    public function insertProduct(Request $request)
    {
        //Custom Message
        $message = [
            'name.required' => 'Category name must be filled',
            'name.between' => 'Category length must between 3-20 character'
        ];

        //Validasi
        $validator = Validator::make($request->all(),[
            'name' => 'required|between:3 , 20'
        ],$message);

        if($validator->fails())
        {
            return back()->withErrors($validator);
        }

        $category = new category();
        $category->name = $request->name;
        $category->save();
        return redirect('viewcategory');
    }

    public function viewcategory()
    {
        $category = category::All();
        return view('viewcategory',compact('category'));
    }

    public function formUpdateCategory($id)
    {
        $category = category::find($id);
        return view('formUpdateCategory',compact('category'));
    }
    public function updateCategory(Request $request)
    {
        $message = [
            'name.required' => 'Di isi ya bang',
            'name.between'=>'harus 3-20'
        ];

        //Validasi
        $validator = Validator::make($request->all(),[
            'name' => 'required|between:3,20',
     
        ],$message);

        if($validator->fails())
        {
            return back()->withErrors($validator);
        }
     

        $category = category::find($request->id);
        $category->name = $request->name;
        $category->save();
        //return back();
      return redirect('viewcategory');
    }

    public function updateview()
    {
        return view('formUpdateCategory');
    }

    public function deletecategory($id)
    {
        category::destroy($id);
        return back();
    }
}
