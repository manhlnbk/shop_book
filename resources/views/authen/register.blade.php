<!DOCTYPE html>
<html lang="en">
<head>
    @include('head')
</head>

<body > <!--class="animsition" -->

<!-- Header -->
@include('header')
<div class="bg0 m-t-23 p-b-140 p-t-80">
    <div class="container" style="margin-top: 100px;">
        <div style="width: 500px;margin: auto;">
            @if (Session::has('success'))
                <div class="alert alert-success">
                    {{ Session::get('success') }}
                </div>
            @endif
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="" class="form-signup" method="POST">
                    <h1 class="h3 mb-3 font-weight-normal" style="text-align: center">Đăng Ký</h1>
                    <div class="form-group">
                        <input type="text" name="name" class="form-control" placeholder="Full name" required autofocus="">
                    </div>
                    <div class="form-group">
                        <input type="email" name="email" class="form-control" placeholder="Email address" required autofocus="">
                    </div>
                    <div class="form-group">
                        <input type="text" name="phone" class="form-control" placeholder="Phone" required autofocus="">
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" class="form-control" placeholder="Password" required autofocus="">
                    </div>
                    <div class="form-group">
                        <input type="password" name="password_confirmation" class="form-control" placeholder="Repeat Password" required autofocus="">
                    </div>

                        <button class="btn btn-primary btn-block" type="submit"> Sign Up</button>
                        <a href="{{route('login')}}" id="cancel_signup">Back</a>
                    @csrf
                </form>
        </div>
    </div>
</div>

@include('footer')
@yield('script')
</body>
</html>