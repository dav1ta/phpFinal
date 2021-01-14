<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function send(Request $request )
    {

        Mail::raw($request->input('message'), function ($message) use ($request) {
            $message -> to($request->input('email'))
                ->subject($request->input('subject'));
        });
        return redirect()->back();
    }
}
