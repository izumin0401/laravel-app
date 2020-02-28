<?php
namespace App\Services;

use App\User;
use App\Interfaces\UserInterface;

class UserService implements UserInterface
{
    /**
     * ユーザ情報を全取得する
     *
     * @return 全ユーザ情報
     */
    public function index() {
        return User::all();
    }
}
