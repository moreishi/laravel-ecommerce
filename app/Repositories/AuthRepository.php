<?php

namespace App\Repositories;

use App\Interfaces\IAuthRepository;
use App\DTO\LoginDTO;

use App\Models\User;
use Illuminate\Support\Facades\Auth;


class AuthRepository implements IAuthRepository {

    public function login(LoginDTO $loginDTO) {

        if(!User::where('email',$loginDTO->email)->count() > 0) {
            return response()->json(['message' => 'Email not found'], 404);
        }

        if (!Auth::attempt(["email" => $loginDTO->email, "password" => $loginDTO->password])) {
            return response()->json([
                'message' => 'Invalid login details'
            ], 422);
        }

        $user = User::where('email', $loginDTO->email)->firstOrFail();
        
        $token = $user->createToken('authToken')->plainTextToken;
        
        return response()->json([
                'user' => $user,
                'access_token' => $token,
                'token_type' => 'Bearer',
        ]);

    }

}