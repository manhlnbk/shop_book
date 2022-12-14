@extends('admin.main')

@section('content')
<div class="form-group">

    <form action="{{route('product.search')}}" method="post">
        <input type="search" name="search" class="form-control" />
        <button class="flex-c-m trans-04 btn btn-primary">
            Search
        </button>
    
        @csrf
    </form>
</div>
    @if (count($products) > 0)
        <table class="table">
            <thead>
            <tr>
                <th style="width: 50px">ID</th>
                <th>Tên Sản Phẩm</th>
                <th>Danh Mục</th>
                <th>Giá Gốc</th>
                <th>Giá Khuyến Mãi</th>
                <th>Còn</th>
                <th>Active</th>
                <th style="width: 100px">&nbsp;</th>
            </tr>
            </thead>
            <tbody>
                @foreach($products as $key => $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->menu->name }}</td>
                    <td>{{ $product->price }}</td>
                    <td>{{ $product->price_sale }}</td>
                    <td>{{ $product->quantity }}</td>
                    <td>{!! \App\Helpers\Helper::active($product->active) !!}</td>
                    <td>
                        <a class="btn btn-primary btn-sm" href="/admin/products/edit/{{ $product->id }}">
                            <i class="fas fa-edit"></i>
                        </a>
                        <a href="#" class="btn btn-danger btn-sm"
                        onclick="removeRow({{ $product->id }}, '/admin/products/destroy')">
                            <i class="fas fa-trash"></i>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div class="card-footer clearfix">
            {!! $products->links() !!}
        </div>
    @else
        <div style="text-align: center">
            <h3>Chưa có dữ liệu</h3>
        </div>
    @endif
@endsection


