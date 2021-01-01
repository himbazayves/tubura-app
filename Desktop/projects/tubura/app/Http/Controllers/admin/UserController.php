<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Http\Requests\UserPostRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{

    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    public function show(Request $request, User $user)
    {
        return view('admin.users.show', compact('user'));
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|unique:users',
            
        ]);

        

         $user = new User;
         $email=$request->email;
         $user->email= $email;
         $user->password=Hash::make($email);
         $user->name=$email;
         $user->save();

        
        return redirect()->route('users.index')->with('status', 'User created!');
    }

    public function edit(Request $request, User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    public function update(UserPostRequest $request, User $user)
    {
        $data = $request->validated();
        $user->fill($data);
        $user->save();
        return redirect()->route('users.index')->with('status', 'User updated!');
    }

    public function destroy(Request $request, User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('status', 'User destroyed!');
    }
}
