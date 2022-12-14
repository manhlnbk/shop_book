<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\UserRequest;
use App\Models\User;

class LoginController extends Controller
{
    public function index()
    {
        return view('admin.users.login');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email:filter',
            'password' => 'required'
        ]);
        
        if (Auth::attempt([
                'email' => $request->input('email'),
                'password' => $request->input('password'),
                'active' => 0,
                'role_id' => 1
            ], $request->input('remember'))) {

            return redirect()->route('admin');
        }

        Session::flash('error', 'Email, Password không đúng hoặc không có quyền truy cập');
        return redirect()->back();
    }
    
    public function home()
    {
        return view('Backend.home');
    }

    public function Register()
    {
        return view('admin.users.register');
    }

    public function userRegister(UserRequest $request)
    {
        $user = User::Register($request);
        Session::flash('success', 'Đăng ký thành công');

        return redirect()->route('login');
    }
    
    public function logout(Request $request)
    {
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('admin');
    }
}
