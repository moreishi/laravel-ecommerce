<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginFormRequest;
use App\Http\Requests\RegisterFormRequest;

use App\Repositories\AuthRepository;
use App\Services\AuthService;
use App\DTO\RegisterDTO;
use App\DTO\LoginDTO;

class AuthController extends Controller
{

    public $authRepository;
    public $authService;

    public function __construct(
        AuthRepository $authRepository, 
        AuthService $authService)
    {
        $this->authRepository = $authRepository;
        $this->authService = $authService;
    }

    public function login(LoginFormRequest $request) {

        $loginDTO = new LoginDTO(
            $request->email, 
            $request->password
        );

        return $this->authRepository->login($loginDTO);
    }
    
    public function register(RegisterFormRequest $request) {

        $registerDTO = new RegisterDTO(
            $request->firstName,
            $request->lastName,
            $request->email,
            $request->password,
            $request->confirmPassword
        );

        return $this->authService->register($registerDTO);
    }
}
