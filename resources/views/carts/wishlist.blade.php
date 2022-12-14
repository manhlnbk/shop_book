@extends('main')

@section('content')
    <form class="bg0 p-t-130 p-b-85" method="post">
        @include('admin.alert')

        @if (count($products) != 0)
            <div class="container">
                <div class="row">
                    <div class="col-lg-10 col-xl-7 m-lr-auto m-b-50">
                        <div class="m-l-25 m-lr-0-xl" style="width: 900px;margin-left: -100px;">
                            <div class="wrap-table-shopping-cart">
                                @php $total = 0; @endphp
                                <table class="table-shopping-cart">
                                    <tbody>
                                    <tr class="table_head">
                                        <th class="column-1">Product</th>
                                        <th class="column-2"></th>
                                        <th class="column-3" style="text-align: center">Price</th>
                                        <th class="column-6">&nbsp;</th>
                                    </tr>

                                    @foreach($products as $key => $product)
                                        @php
                                            $price = $product->price_sale != 0 ? $product->price_sale : $product->price;
                                        @endphp
                                        <tr class="table_row list_cart">
                                            <td class="column-1">
                                                <div class="how-itemcart1">
                                                    <img src="{{ asset('images/products/' . $product->thumb) }}" alt="IMG">
                                                </div>
                                            </td>
                                            <td class="column-2" ><a href="/san-pham/{{ $product->id }}-{{ Str::slug($product->name, '-') }}.html"">{{ $product->name }}</a></td>
                                            <td class="column-3" name="price_end" style="text-align: center">${{ number_format($price, 0, '', '.') }}</td>
                                            
                                            <td class="column-5" style="text-align: center">
                                                <a href="{{route('deleteWishlist',$product->id)}}">Xóa</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                   
                </div>
            </div>
    </form>
    @else
        <div class="text-center" style="margin-bottom: 300px"><h2>Danh sach yêu thích trống</h2></div>
    @endif
@endsection
@section('script')

@endsection

