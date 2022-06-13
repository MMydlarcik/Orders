<?php

namespace App\Services;

use App\Http\Requests\UserRequest;
use App\Models\User;

class UserUpdateService
{
    public function processRequest(UserRequest $request)
    {
        $validated = $request->validated();
        $array = [
            'id' => $validated['id'],
            'username' => $validated['username'],
            'email' => $validated['email'],
            'role' => $validated['role'],
        ];
        return $this->process($array);
    }

    public function process($array)
    {
        $user = User::find($array['id']);
        unset($array['id']);
        return $user->update($array);
    }
}
