<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Http\Requests\PasswordRequest;
use App\Models\User;

class PasswordUpdateService
{
    public function processRequest(PasswordRequest $request)
    {
        $validated = $request->validated();
        $id = $validated['id'];
        $password = $validated['password'];
        return $this->process($id, $password);
    }

    public function process($userId, $password)
    {
        $user = User::find($userId);
        return $user->update([
            'password' => $password
        ]);
    }
}
