@php
    $user = Auth::user();
@endphp
<div class="col-lg-4" style="padding: 15px;background: #F1F1F1;">
    <aside class="user-info-wrapper">
      <div class="user-info">
        <div class="user-avatar">
          <img id="avater_photo_view" src="{{$user->avatar ? asset('images/users/'.$user->avatar) : asset('images/users/placeholder.png')}}" alt="User"  style="border-radius: 50%;;width: 100px;height: 100px;border: 1px solid black">
        </div>

        <div class="user-data">
          <h4 class="h5">{{$user->name}}</h4><span>{{__('Joined')}} {{$user->created_at->format('d/m/Y')}}</span>
        </div>
      </div>
      <nav class="list-group">
        <a class="list-group-item {{ request()->is('user/dashboard') ? 'active' : '' }}" href="{{route('dashboard')}}"><i class="icon-command"></i>{{__('Dashboard')}}</a>
        <a class="list-group-item {{ request()->is('user/profile') ? 'active' : '' }}" href="{{route('user.profile')}}"><i class="icon-user"></i>{{__('Profile')}}</a>
        <a class="list-group-item {{ request()->is('user/password') ? 'active' : '' }}" href="{{route('user.password')}}"><i class="icon-user"></i>{{__('Password')}}</a>
        <a class="list-group-item {{ request()->is('user/order') ? 'active' : '' }}" href="{{route('user.order')}}"><i class="icon-user"></i>{{__('Order')}}</a>
      </nav>
    </aside>


  </div>
