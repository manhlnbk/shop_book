<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.index',[
            'title' => 'Dashboard',
            'allorders' => Customer::whereUserId(Auth::user()->id)->count(),
            'pending' => Customer::whereUserId(Auth::user()->id)->where('status', '0')->count(),
            'accept' => Customer::whereUserId(Auth::user()->id)->where('status', '1')->count(),
            'canceled' => Customer::whereUserId(Auth::user()->id)->where('status', '2')->count()
        ]);
    }

    public function profile()
    {
        return view('dashboard.profile',[
            'title' => 'Profile'
        ]);
    }

    public function profileUpdate(Request $request)
    {
        $user = User::find(Auth::user()->id);
        if ($request->hasFile('avatar')) 
        {
            $avatar_name = time() . '-' . $request->input('name') . $request->file('avatar')->getClientOriginalName();
            $request->file('avatar')->move(public_path('images\users'), $avatar_name);
            $user->avatar = $avatar_name;
        }
        $user->name = $request->name;
        $user->phone = $request->phone;  
        $user->save();

        return redirect()->route('user.profile');
    }

    public function password()
    {
        return view('dashboard.password',[
            'title' => 'Password'
        ]);
    }

    public function passwordUpdate(Request $request)
    {
        // dd($request->all());
        $user = User::find(Auth::user()->id);
        
        $user->password = Hash::make($request->input('password')); 
        $user->save();

        return redirect()->route('user.password');
    }

    public function order()
    {
        return view('dashboard.order',[
            'title' => 'Order',
            'customers' => Customer::where('user_id', Auth::user()->id)->get()
        ]);
    }
}
