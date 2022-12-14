@extends('main')

@section('content')
    <div style="width: 1500px;text-align: center;margin:auto">
        <form class="bg0 p-t-130 p-b-85" action="{{route('checkoutPost')}}" method="post">
            @csrf
            <div class="flex-w flex-t p-t-15">
                <span class="stext-112 cl8">
                        <h1>Thanh Toán</h1>
                </span>
                <div class="size-100 p-r-18 p-r-0-sm w-full-ssm row" style="margin-left: 125px;margin-top:50px">
                    
                        <div class="form-group row" style="width: 85%;">
                            <label class="col-2" for="" style="">Họ Tên:</label>
                            <input type="text" class="form-control col" name="name" required>
                        </div>
                        <div class="form-group row" style="width: 85%;">
                            <label class="col-2" for="" style="">Email:</label>
                            <input type="text" class="form-control col" name="email" value="{{Auth::user()->email}}">
                        </div>
                        
                        
                    
                        <div class="form-group row" style="width: 85%;">
                            <label class="col-2" for="" style="">Địa chỉ:</label>
                            <input type="text" class="form-control col" name="address" required>
                        </div>
                        <div class="form-group row" style="width: 85%;">
                            <label class="col-2" for="" style="">Số điện thoại:</label>
                            <input type="text" class="form-control col" name="phone" required>
                        </div>
                        <div class="row" style="width: 85%;">
                            <label class="col-2" style="">Note:</label>
                            <input class="form-control col" name="content">
                        </div>
                </div>
            </div>
            <button class="btn btn-dark btn-lg" style="margin-left: 700px;margin-top:20px">
               Đặt Hàng
            </button>
        </form>
    </div>

@endsection
@section('script')

@endsection

