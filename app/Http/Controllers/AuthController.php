<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register(Request $request) {
        $inputs = $request->only('name', 'email', 'password');
        $inputs['password'] = bcrypt($inputs['password']);
        $user = User::create($inputs);

        return response()->json(['data' => $user]);
    }

    public function login(LoginRequest $request) {
        if(Auth::attempt(['email' => request('email'), 'password' => request('password')]))
        {
            $user = Auth::user();
            $token['token'] = $user->createToken('Token')->plainTextToken;
            return response()->json($token);
        } else {
            return response()->json(['error'=>'Unauthorised'], 401);
        }
    }

    public function logout()
    {
        $user = Auth::user();
        $user->tokens()->delete();
        return;
    }
}
