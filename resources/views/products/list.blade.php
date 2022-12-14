<div class="row isotope-grid">
    @foreach($products as $key => $product)
        <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item women">
            <!-- Block2 -->
            <div class="block2">
                <div class="block2-pic hov-img0">
                    <img src="{{ asset('images/products/' . $product->thumb) }}" alt="{{ $product->name }}" width="450px" height="400px">
                </div>

                <div class="block2-txt flex-w flex-t p-t-14">
                    <div class="block2-txt-child1 flex-col-l ">
                        <a href="/san-pham/{{ $product->id }}-{{ Str::slug($product->name, '-') }}.html"
                           class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                            {{ $product->name }}
                        </a>

                        <span class="stext-105 cl3">
							${!!  \App\Helpers\Helper::price($product->price, $product->price_sale)  !!} 
                        </span>
                    </div>
                    <div class="block2-txt-child2 flex-r p-t-3">
                        @if (Auth::check())
                            <a href="javascript:void(0)" class="btn-addwish-b2 dis-block pos-relative fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 tooltip100 addwishlist" id="add_wishlist" data-id={{ $product->id }}>
                                <i class="zmdi zmdi-favorite"></i>
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
