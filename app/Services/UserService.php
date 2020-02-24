<?php
namespace App\Services;

use App\User;
use App\Interfaces\UserInterface;

class UserService implements UserInterface
{
    public function fetch() {
        return User::all();
    }
}
