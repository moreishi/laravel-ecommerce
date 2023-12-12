<?php

namespace Tests\Feature\Auth;

use Symfony\Component\HttpFoundation\Response;
use Tests\Feature\Auth\AuthBaseTest;
use App\Models\User;

class AuthLoginTest extends AuthBaseTest
{
    
    /**
     * When endpoint is avaiable
     * 
     */
    public function test_login_endpoint(): void
    {
        $response = $this->post(AuthBaseTest::HTTP_API_LOGIN);

        $response->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY);
    }

    /**
     * When credentials not exist
     * 
     */
    public function test_login_email_not_exist(): void
    {
        $mockUser = User::factory()->make();

        $response = $this->post(AuthBaseTest::HTTP_API_LOGIN, [
            'email' => $mockUser->email,
            'password' => $mockUser->password
        ]);

        $response->assertStatus(Response::HTTP_NOT_FOUND);
    }

    /**
     * When credentials is invalid
     * 
     */
    public function test_login_invalid(): void
    {
        $mockUser = User::factory()->create();

        $response = $this->post(AuthBaseTest::HTTP_API_LOGIN, [
            'email' => $mockUser->email,
            'password' => $mockUser->password
        ]);

        $response->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY);
    }

    /**
     * When login success
     * 
     */
    public function test_login_success(): void
    {
        
        $user = User::factory()->create();

        $response = $this->post(AuthBaseTest::HTTP_API_LOGIN, [
            'email' => $user->email,
            'password' => "password"
        ]);

        $content = json_decode($response->content());

        $response->assertStatus(Response::HTTP_OK);
    }

}
