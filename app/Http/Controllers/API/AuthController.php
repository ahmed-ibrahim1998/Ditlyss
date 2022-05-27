<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AuthController extends Controller
{

    public function register(Request $request): Response
    {
        $user = User::create($request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed',
            'gender' => 'required|in:male,female',
            'country_id' => 'required',
            'whatsapp_number' => 'required'
        ]));

        $user->assign('client');
        return response([
            'user' => $user,
            '_token' => $user->createToken('FirstAppToken')->plainTextToken,
        ])->setStatusCode(201);
    }

    public function logout(): Response
    {
        auth()->user()->tokens()->delete();
        return response()->setStatusCode(204);
    }

    public function login(Request $request)
    {
        $data = $request->validate([
            'email' => 'required|exists:users,email',
            'password' => 'required'
        ]);

        if (\Auth::attempt($data)) {
            return \response([
                'user' => \Auth::user(),
                '_token' => \Auth::user()->createToken('FirstAppToken')->plainTextToken
            ])->setStatusCode(Response::HTTP_OK);
        }

        return response()->setContent('login failed')->setStatusCode(401);

    }
}
