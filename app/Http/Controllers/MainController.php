<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\Menu\MenuService;
use App\Http\Services\Product\ProductService;
use App\Models\Product;

class MainController extends Controller
{
    protected $menu;
    protected $product;

    public function __construct(MenuService $menu,
        ProductService $product)
    {
        $this->menu = $menu;
        $this->product = $product;
    }

    public function index()
    {
        return view('home', [
            'title' => 'Shop',
            'menus' => $this->menu->show(),
            'products' => $this->product->get()
        ]);
    }

    public function loadProduct(Request $request)
    {
        $page = $request->input('page', 0);
        $result = $this->product->get($page);
        if (count($result) != 0) {
            $html = view('products.list', ['products' => $result ])->render();

            return response()->json([ 'html' => $html ]);
        }

        return response()->json(['html' => '' ]);
    }

    public function search(Request $request)
    {
        $product = Product::where('name','like', '%'.$request->search.'%')->get();
        
        return view('menu', [
            'title' => "kết quả của: " . $request->search,
            'products' => $product,
            'menu'  => ""
        ]);
    }
}
