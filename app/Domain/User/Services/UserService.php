<?php

namespace App\Domain\User\Services;

use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use App\Domain\User\ValueObjects\User as ValueObject;

class UserService
{
    public function store(ValueObject $valueObject)
    {
        $user = $valueObject->getEntityToStore();
        $user->save();

        return response()->json(['user' => $user, 'message' => 'CREATED'], 201);
    }

    public function login(ValueObject $valueObject)
    {
        if (!$token = Auth::attempt($valueObject->loginData())) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        return new JsonResponse([
            'token' => $token,
            'token_type' => 'bearer',
            'expires_in' => Auth::factory()->getTTL() * 84600
        ], 200);
    }
}
