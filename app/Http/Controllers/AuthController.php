<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use PDO;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

        if ($validator->fails()) {
            return response(['errors' => $validator->errors()->all()], 422);
        }

        $request['password'] = Hash::make($request['password']);
        $request['remember_token'] = Str::random(10);
        $user = User::create($request->toArray());
        $token = $user->createToken('Laravel Password Grant Client')->accessToken;

        $response = ['token' => $token];
        return response($response, 200);
    }

    public function login(Request $request)
    {
        if ($request->method() == "POST") {
            if (auth()->guard()->attempt($request->only('email', 'password'))) {
                return redirect()->intended();
            }

            throw new \Exception('There was some error while trying to log you in');
        } else {
            return view('login');
        }
    }

    public function me()
    {
        return response()->json([
            'message' => 'getting user information, completed',
            'account' => auth()->user()
        ], 200);
    }

    public function logout()
    {
        auth()->logout();
        return redirect()->to('login');
    }

    public function detail(Request $request)
    {
        return response()->json(['message' => 'restricted uri'], 200);
    }
}
