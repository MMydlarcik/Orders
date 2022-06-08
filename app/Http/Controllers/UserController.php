<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\UserRequest;
use App\Http\Requests\PasswordRequest;

class UserController extends Controller
{
    public function userList()
    {
        $users = User::all();
        return view('users.users')->with([
            'users' => $users
        ]);
    }

    public function user($id)
    {
        $user = User::find($id);
        return view('users.show')->with('user', $user);
    }

    public function destroy(Request $request)
    {
        $id = $request->input('id');
        User::destroy($id);
        return redirect(route('users.users'))->with('success', 'Success');
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('users.edit')->with('user', $user);
    }


    public function update(UserRequest $request)
    {
        /*
        $id = $request->input('id');
        $username = $request->input('username');
        $email = $request->input('email');

        $user = User::find($id);
        $user->update([
            'username' => $username,
            'email' => $email
        ]);
        */

        $id = $request->input('id');
        $username = $request->input('username');
        $email = $request->input('email');

        $user = User::find($id);
        if ($request->validated()) {
            $user->update([
                'username' => $username,
                'email' => $email
            ]);
        }
        return redirect(route('users.users'));
    }

    public function updatePassword(PasswordRequest $request)
    {
        /*
        $id = $request->input('id');
        $password = $request->input('password');
        $user = User::find($id);
        $user->update([
            'password' => $password
        ]);
        */
        $id = $request->input('id');
        $password = $request->input('password');
        $user = User::find($id);
        if ($request->validated()) {
            $user->update([
                'password' => $password
            ]);
        }
        return redirect(route('users.users'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'username' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

        $username = $request->input('username');
        $email = $request->input('email');
        $password = $request->input('password');


        User::create([
            'username' => $username,
            'email' => $email,
            'password' => $password,
        ]);
        return redirect(route('users.users'))->with('success', 'Success');
    }
}
