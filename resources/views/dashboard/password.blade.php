@extends('main')

@section('content')
@php
    $user = Auth::user();
@endphp
    <div style="margin-top: 150px;">
        <!-- Page Content-->
        <div class="container padding-bottom-3x mb-1">
            <div class="row">
                @include('dashboard.user_sidebar')
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-body">
                            <div class="padding-top-2x mt-2 hidden-lg-up"></div>
                                <form  class="row" action="{{route('user.password.update')}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="account-fn">{{__('New Password')}}</label>
                                            <input class="form-control" name="password" type="password" id="account-fn" placeholder="Nhập mật khẩu" required autocomplete="off">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="account-email">{{__('Password Confirmation')}}</label>
                                            <input class="form-control" name="password_confirmation" type="password" placeholder="Nhập mật khẩu xác nhận" id="account-email" required autocomplete="off">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <hr class="mt-2 mb-3">
                                        <div class="d-flex flex-wrap justify-content-between align-items-center">
                                            <button class="btn btn-primary margin-right-none" type="submit">{{__('Update Pasword')}}</button>
                                        </div>
                                    </div>
                                </form>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
@endsection
@section('script')
    
@endsection
