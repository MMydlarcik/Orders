<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserListController extends Controller
{
    public function userList() 
    {
        $users = User::all();
        return view('home.users')->with([
            'users'=> $users
        ]);
    }
}