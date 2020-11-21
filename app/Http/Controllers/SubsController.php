<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Mail\SubscribeEmail;
use App\Subscription;
use Illuminate\Http\Request;


class SubsController extends Controller
{
    public function subscribe(Request $request)
    {
        $this->validate($request,[
            'email'=> 'required|email|unique:subscriptions'
        ]);

       $subs=Subscription::add($request->get('email'));

        \Mail::to($subs)->send(new SubscribeEmail($subs));

        return redirect()->back()->with('status','Проверьте почту');
    }
    public function  verify($token)
    {
        $subs=Subscription::where('token',$token)->firstOrFail();
        dd('ok');

    }
}
