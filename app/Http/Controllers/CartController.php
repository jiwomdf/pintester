<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MsPhoto;
use App\MsCart;
use Auth;
use App\User;
use App\MsTransaction;

class CartController extends Controller
{
    //untuk view cart
    public function viewCart()
    {
        $cart = MsCart::select('MsPhoto.id','MsPhoto.title','MsPhoto.image','MsPhoto.price','Users.Name')->join('Users','Users.id','=', 'MsCart.user_id')->join('MsPhoto','MsPhoto.id','=','photo_id')->where('MsCart.user_id', '=', Auth::user()->id)->get();
        
        return View('Cart',compact('cart'));
    }

    //untuk insert cart
    public function insertToCart(Request $request)
    {
        $photos = MsPhoto::where('id','LIKE',$request['drug'])->first();

        $MsCart = new MsCart();
        $MsCart->photo_id = $photos->id;
        $MsCart->user_id = Auth::user()->id;
        $MsCart->save();

        $cart = MsCart::select('MsPhoto.id','MsPhoto.title','MsPhoto.image','MsPhoto.price','Users.Name')->join('Users','Users.id','=', 'MsCart.user_id')->join('MsPhoto','MsPhoto.id','=','photo_id')->where('MsCart.user_id', '=', Auth::user()->id)->get();

        return view('Cart', compact('cart'));
    }

    //untuk insert transaction
    public function insertTransaction(Request $request)
    {        
        $MsTransaction = new MsTransaction();
        $MsTransaction->photo_id = $request->id;
        $MsTransaction->Date = $request->date;
        $MsTransaction->user_id = Auth::user()->id;
        $MsTransaction->price = $request->price;
        $MsTransaction->save();
        
        $transaction = MsTransaction::select('MsTransaction.id','MsTransaction.user_id','MsTransaction.price','date','MsPhoto.image','Users.Name')->join('Users','Users.id','=','MsTransaction.user_id')->join('MsPhoto','MsPhoto.id','=','photo_id')->where('MsTransaction.user_id','=',Auth::user()->id)->get();

        MsCart::truncate();

        return view('Transaction', compact('transaction'));
    }

    //untuk remove cart
    public function removeCart($id)
    {
        MsCart::destroy($id);
        $cart = MsCart::select('MsPhoto.id','MsPhoto.title','MsPhoto.image','MsPhoto.price','Users.Name')->join('Users','Users.id','=', 'MsCart.user_id')->join('MsPhoto','MsPhoto.id','=','photo_id')->where('MsCart.user_id', '=', Auth::user()->id)->get();

        return view('Cart', compact('cart'));
    }

    //untuk viewtransaction
    public function viewTransaction($id)
    {
        $transaction = MsTransaction::select('MsTransaction.id','MsTransaction.user_id','MsTransaction.price','date','MsPhoto.image','Users.Name')->join('Users','Users.id','=','MsTransaction.user_id')->join('MsPhoto','MsPhoto.id','=','photo_id')->where('MsTransaction.user_id','=',Auth::user()->id)->get();

        return view('Transaction', compact('transaction'));
    }
}
