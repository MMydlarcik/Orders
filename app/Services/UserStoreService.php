<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Models\User;

class UserStoreService
{
    public function processRequest(Request $request)
    {
        $array = [
            'username' => $request->input('username'),
            'email' => $request->input('email'),
            'role' => $request->input('role'),
            'password' => $request->input('password'),
        ];
        return $this->process($array);
    }

    public function process($array)
    {
        return User::create($array);
    }
}
