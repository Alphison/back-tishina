<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Resources\ProfileResource;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(LoginRequest $request){

        $data = $request->validated();

        if(!auth()->attempt($data)) return response()->json(['error' => 'Неверный email или пароль'], 401);

        $user = User::query()->where('email', $data['email'])->firstOrFail();

        $token = $user->createToken($user['name'])->plainTextToken;

        return response()->json(['token' => $token]);

    }

    public function me(){
        return new UserResource(request()->user());
    }

    public function profile(){
        return new ProfileResource(request()->user());
    }

    public function logout() {
        $user = request()->user();

        $user->tokens()->where('id', $user->currentAccessToken()->id)->delete();

        return response()->json(['Logout success'], 201);
    }
}
