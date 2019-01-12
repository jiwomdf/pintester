<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\category;
use App\MsPhoto;
use App\User;
use App\TrCategory;
use Auth;
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
    //view home
    public function index()
    {
        $photos = MsPhoto::All();
        return view('home', compact('photos'));
    }

    //untuk view cart
    public function insertcat()
    {
        return view('categoryins');
    }

    //untuk insert category
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

    //untuk view category
    public function viewcategory()
    {
        $category = category::All();
        return view('viewcategory',compact('category'));
    }

    //untuk ke page update category berdasarkan id
    public function formUpdateCategory($id)
    {
        $category = category::find($id);
        return view('formUpdateCategory',compact('category'));
    }

    //untuk update category
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

    //untuk ke view from update category
    public function updateview()
    {
        return view('formUpdateCategory');
    }

    //untuk delete category
    public function deletecategory($id)
    {
        category::destroy($id);
        return back();
    }

    //untuk search photo
    public function searchPhoto(Request $request)
    {
        $photos = msphoto::where('title','like','%'.$request->search.'%')->orWhere('caption','like','%'.$request->search.'%')
            ->paginate(5);
        return view('home',compact('photos'));
    }

    //jiwo add 6 januari 2018
    //manage user
    public function manageuser()
    {
        $users = User::paginate(5);

        $count = count($users);

        return view('ManageUser', compact('users'), compact('count'));
    }

    //filter follow berdasarkan yg di follow
    public function basedFollow()
    {
        $choosenCategory = TrCategory::select('category_id','categories.name')->join('categories','category_id','=','categories.id')->where('user_id','like',Auth::user()->id)->get();
        

        for($i = 0; $i < count($choosenCategory); $i++ )
        {
            $photos = msphoto::where('category','like',$choosenCategory[$i]->id)->paginate(5);
        }

        dd($photos);
        
        return view('home',compact('photos'));
    }
}
