@extends('admin.main')

@section('content')
<div class="row">
    <div class="col-lg-8">
       <div class="padding-top-2x mt-2 hidden-lg-up"></div>
           <div class="row u-d-d">
            <div class="col-md-6 mb-4">
                <div class="card round">
                    <div class="card-body text-center">
                        <i class="icon-shopping-bag"></i>
                        <p class="mt-3">{{__('Doanh Số Ngày')}}</p>
                        <h4><b>{{$totalDay}} $</b></h4>
                    </div>
                </div>
            </div>
               <div class="col-md-6 mb-4">
                   <div class="card round">
                       <div class="card-body text-center">
                           <i class="icon-shopping-bag"></i>
                           <p class="mt-3">{{__('Doanh Số Tuần Này')}}</p>
                           <h4><b>{{$totalWeek}} $</b></h4>
                       </div>
                   </div>
               </div>
               <div class="col-md-6 mb-4">
                   <div class="card round">
                       <div class="card-body text-center">
                           <i class="icon-shopping-bag"></i>
                           <p class="mt-3">{{__('Doanh Số Tháng Này')}}</p>
                           <h4><b>{{$totalMonth}} $</b></h4>
                       </div>
                   </div>
               </div>
               <div class="col-md-6 mb-4">
                   <div class="card round">
                       <div class="card-body text-center">
                           <i class="icon-shopping-bag"></i>
                           <p class="mt-3">{{__('Doanh Số Năm')}}</p>
                           <h4><b>{{$totalYear}} $</b></h4>
                       </div>
                   </div>
               </div>
           </div>
       </div>
   </div>
</div>
@endsection


