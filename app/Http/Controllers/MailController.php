<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Interfaces\MailInterface;
use App\Traits\LogTrait;

class MailController extends Controller
{
    use LogTrait;

    private $mailService;

    public function __construct(MailInterface $mailService)
    {
        $this->mailService = $mailService;
    }

    /**
     * メール送信API
     */
    public function store()
    {
        $this->start();

        $this->mailService->store();

        $this->end();
    }
}
