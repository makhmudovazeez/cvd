<?php


namespace App\Services;


use App\Models\User;

class UserService
{

    private $users;

    public function __construct()
    {
        $this->users = new User();
    }

}
