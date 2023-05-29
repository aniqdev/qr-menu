<?php

namespace App\Http\Controllers\Auth;

use App\Providers\RouteServiceProvider;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class LoginController extends Controller
{
    public function googleLogin(Request $request)
    {
        if(!$request->access_token){
            throw new \Exception('Access token is required');
        }

        $opts = ["http" => ["header" => 'Authorization: Bearer ' . $request->access_token]];
        $context = stream_context_create($opts);

        try {
            $response = file_get_contents('https://www.googleapis.com/oauth2/v1/userinfo', false, $context);

            $response = json_decode($response, true);

            $email = $response['email'] ?? null;

            $name = $response['name'] ?? null;

            if (!$email || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
                throw new \Exception('Invalid email format');
            }

            $user = User::where('email', $email)->first();

            if(!$user){
                return redirect()->route('register')->with(['email' => $email, 'name' => $name]);
            }

            auth()->login($user, true);

            return redirect()->intended(RouteServiceProvider::HOME);

        } catch (\Throwable $e) {
            echo $e->getMessage();
        }
    }
}
