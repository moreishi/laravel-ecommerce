<?php

namespace App\DTO;

use App\DTO\AuthDTO;

class LoginDTO extends AuthDTO {
    
    public $email;
    public $password;

    public function __construct($email, $password)
    {
        $this->email = $email;
        $this->password= $password;
    }

}