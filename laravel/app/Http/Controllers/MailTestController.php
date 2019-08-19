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


    public function sendContactMail(Request $request) {

        $mailContent = $request->comment;

        $mailClass = new MailToMyself();

        Mail::to('hanndeba2@student.arteveldehs.be')->send($mailClass);
        //Mail::to('frederick.roegiers@arteveldehs.be')->send($mailClass);

        return back()->with([
            'notification' => 'success',
            'message' => 'Uw mail werd succesvol verzonden'
        ]);
        return redirect('/');
    }
}
