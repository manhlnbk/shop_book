<!DOCTYPE html>
<html lang="en">
<head>
    @include('head')
</head>

<body > <!--class="animsition" -->

<!-- Header -->
@include('header')
{{-- @php
    
@endphp
<!-- Cart -->
@include('cart') --}}

@yield('content')

<div style="margin-top:100px">
    @include('footer')
</div>
@yield('script')
</body>
</html>
