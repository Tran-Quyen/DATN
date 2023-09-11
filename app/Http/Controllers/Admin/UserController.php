<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(){
        $users = User::query()->orderBy('created_at', 'desc')->paginate(20);
        return view('admin.users.index', compact('users'));
    }

    public function create(){
        return view('admin.users.create');
    }

    public function store(Request $request){
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
            'role_as' => ['required', 'integer']
        ]);
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role_as' => $request->role_as
        ]);

        return redirect('/admin/users')->with('message', 'User created');
    }

    public function edit(int $userId){
        $user = User::findOrFail($userId);
        return view('admin.users.edit', compact('user'));
    }

    public function update(int $userId, Request $request){
        $user = User::findOrFail($userId);
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'min:8'],
            'role_as' => ['required', 'integer']
        ]);
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role_as' => $request->role_as
        ]);

        return redirect('/admin/users')->with('message', 'User updated');
    }

    public function deleteUser(Request $request)
    {
        $user = User::findOrFail($request->user_id);
        if($user->count() > 0) {
            // $destination = $slider->image;
            // if(File::exists($destination)) {
            //     File::delete($destination);
            // }
            $user->delete();
            return response()->json([
                'status' => 'success'
            ]);
        }
        return response()->json([
            'status' => 'something_wrong'
        ]);
    }

    public function searchUser(Request $request){
        $users = User::where('name', 'like', '%'.$request->search_str.'%')
                            ->orWhere('email', 'like', '%'.$request->search_str.'%')
                            ->orderBy('updated_at', 'desc')
                            ->paginate(5);
        if($users->count() >= 1) {
            return view('admin.users.show', compact('users'));
        }else {
            return response()->json([
                'status' => 'nothing_found'
            ]);
        }
    }
}
