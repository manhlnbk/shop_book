@extends('main')

@section('content')
<div class="page-title">
    <div style="margin-top: 150px;">
        <!-- Page Content-->
        <div class="container padding-bottom-3x mb-1">
            <div class="row">
                @include('dashboard.user_sidebar')
                <div class="col-lg-8">
                    <div class="cart">
                        <div class="card-body"></div>
                            <div class="padding-top-2x mt-2 hidden-lg-up"></div>
                                <div class="row u-d-d">
                                    <div class="col-md-6 mb-4">
                                        <div class="card round">
                                            <div class="card-body text-center">
                                                <i class="fa fa-shopping-bag"></i>
                                                <p class="mt-3">{{__('All Order')}}</p>
                                                <h4><b>{{$allorders}}</b></h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <div class="card round">
                                            <div class="card-body text-center">
                                                <i class="fa fa-shopping-bag"></i>
                                                <p class="mt-3">{{__('Completed Order')}}</p>
                                                <h4><b>{{$accept}}</b></h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <div class="card round">
                                            <div class="card-body text-center">
                                                <i class="fa fa-shopping-bag"></i>
                                                <p class="mt-3">{{__('Canceled Order')}}</p>
                                                <h4><b>{{$canceled}}</b></h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <div class="card round">
                                            <div class="card-body text-center">
                                                <i class="fa fa-shopping-bag"></i>
                                                <p class="mt-3">{{__('Pending Order')}}</p>
                                                <h4><b>{{$pending}}</b></h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
    
@endsection
