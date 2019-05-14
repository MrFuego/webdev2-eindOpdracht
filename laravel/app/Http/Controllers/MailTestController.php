<?php

namespace App\Http\Controllers;

use App\Mail\MailToMyself;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailTestController extends Controller
{
    public function sendMail() {
        $mailClass = new MailToMyself();
        Mail::to('hanndeba2@student.arteveldehs.be')->send($mailClass);
        //Mail::to('frederick.roegiers@arteveldehs.be')->send($mailClass);
    }
}
