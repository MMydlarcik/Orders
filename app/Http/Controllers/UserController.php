<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\UserRequest;
use App\Http\Requests\PasswordRequest;
use App\Services\PasswordUpdateService;
use App\Services\UserStoreService;
use App\Services\UserUpdateService;

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
        if (auth()->user()->role == 'admin') {
            $id = $request->input('id');
            User::destroy($id);
            return redirect(route('users.users'))->with('success', 'Success');
        } else return redirect(route('users.users'));
    }

    public function edit($id)
    {
        if (auth()->user()->role == 'admin') {
            $user = User::find($id);
            return view('users.edit')->with('user', $user);
        } else return redirect(route('users.users'));
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
        /*
        $id = $request->input('id');
        $username = $request->input('username');
        $email = $request->input('email');
        $role = $request->input('role');
        */
        if (auth()->user()->role == 'admin') {
            $user = new UserUpdateService;
            $user->processRequest($request);
        }
        return redirect(route('users.users'));
    }

    public function updatePassword(Request $request)
    {
        /*
        $id = $request->input('id');
        $password = $request->input('password');
        $user = User::find($id);
        $user->update([
            'password' => $password
        ]);
        */
        /*
        $id = $request->input('id');
        $password = $request->input('password');
        $user = User::find($id);
        */
        if (auth()->user()->role === 'admin') {
            $service = new PasswordUpdateService;
            $service->processRequest($request);
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
            'role' => 'required',
            'password' => 'required',
        ]);

        if (auth()->user()->role === 'admin') {
            $service = new UserStoreService;
            $user = $service->processRequest($request);
            return redirect(route('users.users'))->with('success', 'Success');
        } else return redirect(route('users.users'));
    }
}
