<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Services\CartService;
use App\Models\Cart;

class CartController extends Controller
{
    protected $cart;
    public function __construct(CartService $cart)
    {
        $this->cart = $cart;
    }

    public function index()
    {
        return view('admin.carts.customer', [
            'title' => 'Danh Sách Đơn Đặt Hàng',
            'customers' => $this->cart->getAllCustomer()
        ]);
    }

    public function Pending($status = 0)
    {
        return view('admin.carts.customer', [
            'title' => 'Danh Sách Đơn Đặt Hàng',
            'customers' => $this->cart->getCustomer($status)
        ]);
    }

    public function CusStatus($status)
    {
        return view('admin.carts.customer', [
            'title' => 'Danh Sách Đơn Đặt Hàng',
            'customers' => $this->cart->getCustomer($status)
        ]);
    }

    public function show(Customer $customer)
    {
        $carts = $this->cart->getProductForCart($customer);

        return view('admin.carts.detail', [
            'title' => 'Chi Tiết Đơn Hàng: ' . $customer->name,
            'customer' => $customer,
            'carts' => $carts
        ]);
    }

    public function Accept($id)
    {
        $customer = Customer::find($id);
        $customer->status = 1;
        $customer->save();

        foreach($customer->carts as $cart)
        {
            $product = Product::find($cart->product_id);
            $product->quantity -= $cart->pty;
            $product->save();
        }

        return redirect()->back()->with('success','Đơn hàng đã được chấp nhận');
    }

    public function Cancel($id)
    {
        $customer = Customer::find($id);
        $customer->status = 2;
        $customer->save();

        foreach($customer->carts as $cart)
        {
            $product = Product::find($cart->product_id);
            $product->quantity += $cart->pty;
            $product->save();
        }

        return redirect()->back()->with('success','Đơn hàng đã bị hủy');
    }

    public function cancelTWO($id)
    {
        $customer = Customer::find($id);
        $customer->status = 2;
        $customer->save();

        // foreach($customer->carts as $cart)
        // {
        //     $product = Product::find($cart->product_id);
        //     $product->quantity += $cart->pty;
        //     $product->save();
        // }

        return redirect()->back()->with('success','Đơn hàng đã bị hủy');
    }

}
