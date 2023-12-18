<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register(RegisterRequest $request)
    {
        $user = User::create($request->validated());

        $token = $user->createToken('password')->plainTextToken;

        return response()->json([
            'error' => null,
            'token' => $token,
            'user' => $user,
        ]);
    }

    public function login(Request $request)
    {

        $request->validate([
            'login' => 'required|string',
            'password' => 'required',
        ]);

        if (Auth::attempt(['login' => $request->input('login'), 'password' => $request->input('password')])) {
            $token = Auth::user()->createToken('authToken')->plainTextToken;
            return response()->json([
                'error' => null,
                'user' => \auth()->user(),
                'token' => $token
            ]);
        }

        return response()->json(['message' => 'Invalid credentials'], 401);
    }
}
