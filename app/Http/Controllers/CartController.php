<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\CartService;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use App\Models\Wishlist;
use App\Models\Product;

class CartController extends Controller
{
    protected $cartService;

    public function __construct(CartService $cartService)
    {
        $this->middleware('auth')->except('addwishlist');
        $this->cartService = $cartService;
    }

    public function index(Request $request)
    {
        $result = $this->cartService->create($request);
        if ($result === false) {
            return redirect()->back();
        }

        return redirect('/carts');
    }

    public function show(Request $request)
    {

        $products = $this->cartService->getProduct();
        // dd($products);
        return view('carts.list', [
            'title' => 'Giỏ Hàng',
            'products' => $products,
            'carts' => Session::get('carts')
        ]);
    }

    public function update(Request $request)
    {
        $this->cartService->update($request);

        return redirect('/carts');
    }

    public function remove($id = 0)
    {
        $this->cartService->remove($id);

        return redirect('/carts');
    }

    public function addCart(Request $request)
    {
        $this->cartService->addCart($request);

        return redirect()->route('home');
    }

    public function CheckoutForm()
    {
        $products = $this->cartService->getProduct();

        return view('carts.checkout',[
            'title' => 'Giỏ Hàng',
            'products' => $products,
            'carts' => Session::get('carts')
        ]);
    }

    public function Checkout()
    {
        return redirect()->back();
    }

    public function addWishlist(Request $request)
    {   
        if($request->ajax()){
            $wishlist = new Wishlist;
            $wishlist->user_id = Auth::user()->id;
            $wishlist->product_id = $request->product_id;
            $wishlist->save();

            $count = Wishlist::where('user_id', Auth::user()->id)->get()->count();

            return response()->json(['data' => $wishlist, 'count' => $count]);
        }
        // return response()->json(['data' => $request->product_id]);
    }

    public function Wishlist(Request $request)
    {
        $wishlist = Wishlist::where('user_id', Auth::user()->id)->groupBy('product_id')->get();
        $products = [];
        foreach ($wishlist as $wl) 
        {
            $products[] = Product::where('id', $wl->product_id)->first();
        }

        return view('carts.wishlist', [
            'title' => 'Danh sách yêu thích',
            'products' => $products,
            'carts' =>  $wishlist
        ]);
    }

    public function Delete_Wishlist(Request $request, $id)
    {
        $wishlist = Wishlist::where('user_id', Auth::user()->id)->where('product_id', $id)->first();
        $wishlist->delete();
        
        return redirect()->back();
    }
}
