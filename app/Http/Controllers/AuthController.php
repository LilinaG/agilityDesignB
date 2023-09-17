<?php

// namespace App\Http\Controllers;
// use App\Http\Requests\LoginRequest;
// use App\Http\Requests\CreateUserRequest;
// use Illuminate\Support\Facades\Hash;
// use Illuminate\Support\Facades\Auth;
// use App\Models\User;


// class AuthController extends Controller
// {
//     public function createUser(CreateUserRequest $request)
//     {
//         $user = User::create([
//             'name'=> $request->name,
//             'email'=> $request-> email,
//             'password'=> Hash::make($request-> password),
           
//         ]);
//         return response()->json([
//             'status'=> true,
//             'message'=> 'User created successfully',
//             'token'=> $user->createToken("API TOKEN")-> plainTextToken
//         ], 200);
//     }

//     public function loginUser(LoginRequest $request)
//     {
//        if(!Auth::attempt($request->only(['email', 'password'])))
//        {
//         return response()->json([
//             'status'=> false,
//             'message'=> 'Email & Password do not match with our records'
//         ], 401);
//        }

//        $user= User::where ('email', $request->email)->first();

//        return response()->json([
//         'status'=> true,
//         'message'=> 'User logged in successfully',
//         'token'=> $user->createToken("API TOKEN")->plainTextToken
//        ], 200);
//     }
// }


namespace App\Http\Controllers;
use App\Http\Request\LoginRequest;
//use App\Http\Request\CreateUserRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Auth;

class AuthController extends Controller
{
    public function createUser(Request $request):JsonResponse
    {
        $user = User::create([
            'name'=> $request->name,
            'email'=> $request-> email,
            'password'=> Hash::make($request-> password),

        ]);
        return response()->json([
            'status'=> true,
            'message'=> 'User created successfully',
            'token'=> $user->createToken("API TOKEN")-> plainTextToken
        ], 200);
    }

    public function loginUser(Request $request):JsonResponse
    {
       if(!Auth::attempt($request->only(['email', 'password'])))
       {
        return response()->json([
            'status'=> false,
            'message'=> 'Email & Password do not match with our records'
        ], 401);
       }

       $user= User::where ('email', $request->email)->first();

       return response()->json([
        'status'=> true,
        'message'=> 'User logged successfully',
        'token'=> $user->createToken("API TOKEN")->plainTextToken
       ], 200);
    }
}