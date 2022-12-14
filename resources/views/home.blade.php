@extends('main')

@section('content')
    <!-- Product -->
    <section class="bg0 p-t-23 p-b-140" style="margin-top: 100px;">
        <div class="container">
            <div class="p-b-10">
                <h3 class="ltext-103 cl5">
                    BOOKS Overview
                </h3>
            </div>

            <div class="flex-w flex-sb-m p-b-52">
                <div class="flex-w flex-l-m filter-tope-group m-tb-10">
                    <button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 how-active1" data-filter="*">
                        All BOOKS
                    </button>
                </div>
            </div>

            <div id="loadProduct">
                @include('products.list')
            </div>


            <!-- Load more -->
            <div class="flex-c-m flex-w w-full p-t-45" id="button-loadMore">
                <input type="hidden" value="1" id="page">
                <a onclick="loadMore()" class="flex-c-m stext-101 cl5 size-103 bg2 bor1 hov-btn1 p-lr-15 trans-04">
                    Load More
                </a>
            </div>
        </div>
    </section>
@endsection
@section('script')
    <script>
        $('.addwishlist').on('click', function(){
            var product_id = $(this).attr('data-id');
            $.ajax({
                url: "{{route('addWishlist')}}",
                data: {'product_id' : product_id},
                type: 'GET',
                success: function(data){
                    console.log(data);
                    $('#show_heart').attr('data-notify',data.count);
                }
            });
        });
    </script>
@endsection
