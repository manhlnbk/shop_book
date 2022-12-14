<!DOCTYPE html>
<html lang="en">
<head>
    @include('head')
</head>

<body > <!--class="animsition" -->

<!-- Header -->
@include('header')

<div class="bg0 m-t-23 p-b-140 p-t-80">
    <div class="container">
        <div class="login">
            <div id="logreg-forms">
                @if (Session::has('success'))
                    <div class="alert alert-success">
                        {{ Session::get('success') }}
                    </div>
                @endif
                @if (Session::has('error'))
                    <div class="alert alert-success">
                        {{ Session::get('error') }}
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
                <form class="form-signin" action="" method="POST">
                    <h1 class="h3 mb-3 font-weight-normal" style="text-align: center">Đăng nhập</h1>
                    <input type="email" name="email" class="form-control" placeholder="Email address" required="">
                    <input type="password" name="password" class="form-control" placeholder="Password" required="">
                    
                    <button class="btn btn-success btn-block" type="submit">Sign in</button>
                    <hr>
                    <!-- <p>Don't have an account!</p>  -->
                    <a href="{{route('register')}}" class="btn btn-primary btn-block" id="btn-signup" style="color: white;"> Sign up New Account</a>
                    @csrf
                </form>
            </div>
        </div>
    </div>
</div>

@include('footer')
@yield('script')
</body>
</html>