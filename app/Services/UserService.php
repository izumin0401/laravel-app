<?php
namespace App\Services;

use App\User;
use App\Interfaces\UserInterface;

class UserService implements UserInterface
{
    public function index() {
        return User::all();
    }
}
