<?php


namespace App\Http\Responses;


use Bouncer;

class LoginResponse implements \Laravel\Fortify\Contracts\LoginResponse
{

    public function toResponse($request)
    {
        if ($request->wantsJson()) {
            return response()->json(['two_factor' => false]);
        }
        if (Bouncer::is(auth()->user())->an('admin')) {
            return redirect()->intended('/admin');
        }
        if (Bouncer::is(auth()->user())->a('vendor')) {
            return redirect()->intended('/vendor/');
        }
        if (Bouncer::is(auth()->user())->a('client')) {
            return redirect()->intended('/client/');
        }
        if (Bouncer::is(auth()->user())->a('driver')) {
            return redirect()->intended('/driver/');
        }
    }
}
