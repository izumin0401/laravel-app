<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Interfaces\UserInterface;
use App\Traits\LogTrait;

class UserController extends Controller
{
    use LogTrait;

    private $userService;

    public function __construct(UserInterface $userService)
    {
        $this->userService = $userService;
    }

    /**
     * ユーザ情報全取得API
     *
     * @return 全ユーザ情報
     */
    public function index()
    {
        $this->start();

        $user = $this->userService->index();

        $this->end();

        return $user;
    }
}
