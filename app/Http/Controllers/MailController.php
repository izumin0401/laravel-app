<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Interfaces\MailInterface;

class MailController extends Controller
{
    private $mailService;

    public function __construct(MailInterface $mailService)
    {
        $this->mailService = $mailService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $this->mailService->store();
    }
}
