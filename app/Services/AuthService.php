<?php

namespace App\Services;

use App\Interfaces\IAuthService;

use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\DTO\RegisterDTO;

class AuthService implements IAuthService {

    public function register(RegisterDTO $registerDTO) {

        $user = User::create([
            'firstName' => $registerDTO->firstName,
            'lastName' => $registerDTO->lastName,
            'email' => $registerDTO->email,
            'password' => Hash::make($registerDTO->password),
        ]);

        $token = $user->createToken('authToken')->plainTextToken;

        return response()->json([
            'user' => $user,
            'access_token' => $token,
            'token_type' => 'Bearer',
        ]);

    }

}