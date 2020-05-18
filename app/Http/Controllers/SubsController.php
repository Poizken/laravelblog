<?php

namespace App\Http\Controllers;

use App\Mail\SubscribeEmail;
use App\Subscription;
use Illuminate\Http\Request;

class SubsController extends Controller
{
    public function subscribe(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email|unique:subscriptions'
        ]);

        $subscriber = Subscription::add($request->get('email'));

        \Mail::to($subscriber)->send(new SubscribeEmail($subscriber));
        $subscriber->generateToken();

        return redirect('/')->back()->with('info', 'Check your email');

    }

    public function verify($token)
    {
        $subscriber = Subscription::where('token', $token)->firstOrFail();
        $subscriber->token = null;
        $subscriber->save();

        return redirect('/')->with('success', 'Your email has been verified');
    }
}
