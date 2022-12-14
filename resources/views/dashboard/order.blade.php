@extends('main')

@section('content')
    <div style="margin-top: 150px;">
        <!-- Page Content-->
        <div class="container padding-bottom-3x mb-1">
            <div class="row">
                @include('dashboard.user_sidebar')
                <div class="col-lg-8">
                    <div class="card-body"></div>
                        <div class="padding-top-2x mt-2 hidden-lg-up">
                               <!-- Page Content-->
                               <table class="table">
                                <thead>
                                <tr>
                                    <th style="width: 5%">STT</th>
                                    <th style="width: 20%">Tên Người nhận</th>
                                    <th style="width: 20%">Số Điện Thoại</th>
                                    <th style="width: 25%">Email</th>
                                    <th style="width: 10%">Nơi nhận</th>
                                    <th style="width: 20%">Ngày Đặt hàng</th>
                                    
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($customers as $key => $customer)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $customer->name }}</td>
                                        <td>{{ $customer->phone }}</td>
                                        <td>{{ $customer->email }}</td>
                                        <td>{{ $customer->address }}</td>
                                        <td>{{ $customer->created_at }}</td>
                                        
                                            {{-- <td>
                                                <a class="btn btn-primary btn-sm" href="/admin/customers/view/{{ $customer->id }}">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                            </td> --}}
                                        
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
@endsection
@section('script')
    
@endsection
