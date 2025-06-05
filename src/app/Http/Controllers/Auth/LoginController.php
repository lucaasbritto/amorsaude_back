<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    
    use AuthenticatesUsers;

    
    protected $redirectTo = '/home';

   
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request){

        $this->validateLogin($request);

        if (Auth::attempt($request->only('email', 'password'))) {
            $user = Auth::user();            
            $token = base64_encode(str_random(40));
            $user->api_token = $token;
            $user->save();

            return response()->json([
                'user' => $user,
                'token' => $token
            ]);
        }

        return response()->json(['message' => 'Credenciais inválidas'], 401);
    }
}
