<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function store(Request $request): JsonResponse
    {
        try {
            $user = User::create($request->only(['name']));
        } catch (\Throwable $e) {
            return response()->json([
                'message' => 'Unable to create the user',
            ], 500);
        }

        return response()->json($user, 201);
    }
}
