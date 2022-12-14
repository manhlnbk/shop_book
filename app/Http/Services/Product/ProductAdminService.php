<?php


namespace App\Http\Services\Product;


use App\Models\Menu;
use App\Models\Product;
use Illuminate\Support\Facades\Session;

class ProductAdminService
{
    public function getMenu()
    {
        return Menu::where('active', 1)->get();
    }

    public function isValidPrice($request)
    {
        if ($request->input('price') != 0 && $request->input('price_sale') != 0
            && $request->input('price_sale') >= $request->input('price')
        ) {
            Session::flash('error', 'Giá giảm phải nhỏ hơn giá gốc');
            return false;
        }

        if ($request->input('price_sale') != 0 && (int)$request->input('price') == 0) {
            Session::flash('error', 'Vui lòng nhập giá gốc');
            return false;
        }

        return  true;
    }

    public function insert($request)
    {
        $isValidPrice = $this->isValidPrice($request);
        if ($isValidPrice === false) return false;

        
            $request->except('_token');
            $items = $request->all();
            if (!empty($request->thumb)) 
            {
                $avatar_name = time() . '-' . $request->input('name') . $request->file('thumb')->getClientOriginalName();
                $request->file('thumb')->move(public_path('images\products'), $avatar_name);
                //$request->file('thumb')->storeAs('public/images/products', $avatar_name);
                $items['thumb'] = $avatar_name;
            }

            $items['quantity'] = $request->quantity;
            $items['name'] = $request->name;
            $items['description'] = $request->description;
            $items['content'] = $request->content;
            $items['menu_id'] = $request->menu_id;
            $items['price'] = $request->price;
            $items['price_sale'] = $request->price_sale;
            $items['active'] = $request->active;
            Product::create($items);
            Session::flash('success', 'Thêm Sản phẩm thành công');
        

        return  true;
    }

    public function get()
    {
        return Product::with('menu')
            ->orderByDesc('id')->paginate(15);
    }

    public function update($request, $product)
    {
        $isValidPrice = $this->isValidPrice($request);
        if ($isValidPrice === false) return false;

        try {
            $request->except('_token');
            if (!empty($request->thumb)) 
            {
                $avatar_name = time() . '-' . $request->input('name') . $request->file('thumb')->getClientOriginalName();
                $request->file('thumb')->move(public_path('images\products'), $avatar_name);
                //$request->file('thumb')->storeAs('public/images/products', $avatar_name);
                $product->thumb = $avatar_name;
            }
            
            $product->quantity = $request->quantity;
            $product->name = $request->name;
            $product->description = $request->description;
            $product->content = $request->content;
            $product->menu_id = $request->menu_id;
            $product->price = $request->price;
            $product->price_sale = $request->price_sale;
            $product->active = $request->active;
            $product->save();
            Session::flash('success', 'Cập nhật thành công');
        } catch (\Exception $err) {
            Session::flash('error', 'Có lỗi vui lòng thử lại');
            \Log::info($err->getMessage());
            return false;
        }
        return true;
    }

    public function delete($request)
    {
        $product = Product::where('id', $request->input('id'))->first();
        if ($product) {
            $product->delete();
            return true;
        }

        return false;
    }
}
