<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\UserRequest;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $users = User::paginate(20);
        if($request->ajax()) {
            $name = $request->input('name');
            $paginator = User::where('name','like','%' . $name . '%')->paginate(20);
            $view = view('admin.users.search.search', compact('paginator'))->render();
            $paginator = view('admin.users.search.paginate', compact('paginator'))->render();

            return response()->json(['data' => $view, 'paginator' => $paginator]);
        }

        return view('admin.users.Index',[
            'users' => $users,
            'title' => 'Danh sách người dùng'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create',[
            'title' => 'Thêm người đùng'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = User::Create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'role_id' => $request->input('Role')
        ]);
        Session::flash('success', 'Thêm thành công');

        return redirect('admin/listUser');
    }

    public function edit($user)
    {
        return view('admin.users.edit',[
            'title' => 'Sửa người dùng',
            'user' => User::find($user)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,User $user)
    {
        $user->name = $request->input('name');
        if (!empty($request->password))
        {
            $user->password = bcrypt($request->input('password'));
        }
        $user->role_id = $request->role_id;
        $user->save();

        return redirect()->route('users.index')->with('success', 'Sửa người dùng thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($user)
    {
        $user = User::find($user);
        $user->delete(); 

        return redirect(route('users.index'))->with('success', 'Xóa thành công');
    }

    public function userProfile()
    {
        $user = Auth::user();

        return view('admin.users.profile',[
            'title' => 'Sửa người dùng',
            'user' => $user
        ]);
    }

    public function updateUserProfile(Request $request)
    {
        $user = Auth::user();
        if ($request->hasFile('avatar')) 
        {
            $avatar_name = time() . '-' . $request->input('name') . $request->file('avatar')->getClientOriginalName();
            $request->file('avatar')->move(public_path('images\users'), $avatar_name);
            //$request->file('avatar')->storeAs('public/images/users', $avatar_name);
            $user->avatar = $avatar_name;
        }
        $user->name = $request->name;
        if (!empty($request->password))
        {
            $user->password = bcrypt($request->input('password'));
        }
        $user->save();

        return redirect('admin/user-profile')->with('success', 'Thay đổi thành công');
    }

    public function updateStatus(Request $request)
    {
        $user = User :: findOrFail($request->user_id); 
        $user->active = $request->input('active');
        $user->save();

        return redirect('listUser');
    }
}
