<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserStoreRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request) {

        if (Auth::guard('web')->attempt(['email' => request('email'), 'password' => request('password')])) {

            $token = auth()->user()->createToken('API Token')->accessToken;

            return response()->json([
                'user' => new UserResource(auth()->user()),
                'token' => $token,
                'message' => 'login succesfully',
            ]);
        } else {
            $response = ['message' => 'Wrong email or password'];
            return response()->json($response, 422);
        }
    }

    public function register(UserStoreRequest $request) {
        $validated = $request->validated();
        $validated['password'] = bcrypt($validated['password']);
        $validated['firstname'] = ucfirst($validated['firstname']);
        $validated['lastname'] = ucfirst($validated['lastname']);

        $user = User::create($validated);

        $token = $user->createToken('API Token')->accessToken;
        $response = ['user' => new UserResource($user), 'token' => $token->token];

        return response($response, 201);
    }

    public function logout(Request $request) {
        $token = $request->user()->token();
        $token->revoke();

        $response = 'You have been succesfully logged out.';
        return response()->json($response, 200);
    }   
}
