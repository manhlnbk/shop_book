@extends('admin.main')

@section('content')
{{-- @php
    if(request()->routeIs('customers')){
        echo (1);
    } else {
        echo (2);
    }
@endphp --}}
    <table class="table">
        <thead>
        <tr>
            <th style="width: 5%">ID</th>
            <th style="width: 20%">Tên Khách Hàng</th>
            <th style="width: 20%">Số Điện Thoại</th>
            <th style="width: 25%">Email</th>
            <th style="width: 10%">Ngày Đặt hàng</th>
            <th style="width: 10%"></th>
            <th style="width: 10%">&nbsp;</th>
        </tr>
        </thead>
        <tbody>
        @foreach($customers as $key => $customer)
            <tr>
                <td>{{ $customer->id }}</td>
                <td>{{ $customer->name }}</td>
                <td>{{ $customer->phone }}</td>
                <td>{{ $customer->email }}</td>
                <td>{{ $customer->created_at }}</td>
                @if (request()->routeIs('customers'))
                    <td>
                       @if ($customer->status == 0)
                           Chờ duyệt
                       @elseif ($customer->status == 1)
                           Đã duyệt
                       @else
                            Đã hủy
                       @endif     
                    </td>
                    <td>
                        {{-- <a href="{{route('cart.accept', $customer->id)}}" class="btn btn-success btn-sm">
                            <i class="fa fa-check" aria-hidden="true"></i>
                        </a>
                        <a href="{{route('cart.cancel', $customer->id)}}" class="btn btn-danger btn-sm">
                            <i class="fa fa-times" aria-hidden="true"></i>
                        </a> --}}
                        <a class="btn btn-primary btn-sm" href="/admin/customers/view/{{ $customer->id }}">
                            <i class="fas fa-eye"></i>
                        </a>
                    </td>
                @elseif(request()->routeIs('customers.pending')) 
                    <td>
                        <a href="{{route('cart.accept', $customer->id)}}" class="btn btn-success btn-sm">
                            <i class="fa fa-check" aria-hidden="true"></i>
                        </a>
                        <a href="{{route('cart.accept.cancel', $customer->id)}}" class="btn btn-danger btn-sm">
                            <i class="fa fa-times" aria-hidden="true"></i>
                        </a>
                        <a class="btn btn-primary btn-sm" href="/admin/customers/view/{{ $customer->id }}">
                            <i class="fas fa-eye"></i>
                        </a>
                    </td>
                @else
                    <td>
                        <a href="{{route('cart.cancel', $customer->id)}}" class="btn btn-danger btn-sm">
                            <i class="fa fa-times" aria-hidden="true"></i>
                        </a>
                        <a class="btn btn-primary btn-sm" href="/admin/customers/view/{{ $customer->id }}">
                            <i class="fas fa-eye"></i>
                        </a>
                    </td>
                @endif
            </tr>
        @endforeach
        </tbody>
    </table>

    <div class="card-footer clearfix">
        {!! $customers->links() !!}
    </div>
@endsection


