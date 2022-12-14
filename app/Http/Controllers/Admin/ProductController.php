<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\ProductRequest;
use App\Http\Services\Product\ProductAdminService;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $productService;

    public function __construct(ProductAdminService $productService)
    {
        $this->productService = $productService;
    }

    public function index()
    {

        return view('admin.product.list', [
            'title' => 'Danh Sách Sản Phẩm',
            'products' => $this->productService->get()
        ]);
    }

    public function search(Request $request)
    {
        $products = Product::where('name','like', '%'.$request->search.'%')->paginate();
        
        return view('admin.product.list', [
            'title' => 'Danh Sách Sản Phẩm',
            'products' => $products
        ]);
    }

    public function create()
    {
        return view('admin.product.add', [
            'title' => 'Thêm Sản Phẩm Mới',
            'menus' => $this->productService->getMenu()
        ]);
    }


    public function store(ProductRequest $request)
    {
        $this->productService->insert($request);

        return redirect()->back();
    }

    public function show(Product $product, $id)
    {
        return view('admin.product.edit', [
            'title' => 'Chỉnh Sửa Sản Phẩm',
            'product' => Product::find($id),
            'menus' => $this->productService->getMenu()
        ]);
    }


    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        $result = $this->productService->update($request, $product);
        if ($result) {
            return redirect('/admin/products/list');
        }

        return redirect()->back();
    }


    public function destroy(Request $request)
    {
        $result = $this->productService->delete($request);
        if ($result) {
            return response()->json([
                'error' => false,
                'message' => 'Xóa thành công sản phẩm'
            ]);
        }

        return response()->json([ 'error' => true ]);
    }
}
