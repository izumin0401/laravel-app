<?php
namespace App\Services;

use Illuminate\Support\Facades\Mail;
use App\Interfaces\MailInterface;
use App\Mail\SampleMail;

class MailService implements MailInterface
{
    /**
     * メールを送信する
     */
    public function store() {
        return Mail::to('sample@gmail.com')->send(
            new SampleMail()
        );
    }
}
