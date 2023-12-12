<?php

namespace App\DTO;

use App\DTO\AuthDTO;

class RegisterDTO extends AuthDTO {

    public function __construct(
        $firstName, 
        $lastName, 
        $email, 
        $password, 
        $confirmPassword)
    {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->email = $email;
        $this->password = $password;
        $this->confirmPassword = $confirmPassword;
    }

}