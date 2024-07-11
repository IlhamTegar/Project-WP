<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class SocialiteController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        try {
            // Menggunakan stateless untuk debugging
            $sosialUser = Socialite::driver('google')->stateless()->user();

            $user = User::updateOrCreate([
                'google_id' => $sosialUser->id,
            ], [
                'name' => $sosialUser->name,
                'email' => $sosialUser->email,
                'password' => Hash::make('123'),
                'google_token' => $sosialUser->token,
                'google_refresh_token' => $sosialUser->refreshToken,
            ]);

            Auth::login($user);

            return redirect('/');
        } catch (\Exception $e) {
            Log::error('Error during Google callback:', ['error' => $e->getMessage()]);
            return redirect('/login')->withErrors(['msg' => 'Google login failed']);
        }
    }

    protected function registerOrLoginUser($data)
    {
        $user = User::where('email', $data->email)->first();

        if (!$user) {
            $user = User::create([
                'name' => $data->name,
                'email' => $data->email,
                'password' => Hash::make(Str::random(24)),
                'google_id' => $data->id,
            ]);
        } else {
            $user->update([
                'google_id' => $data->id,
            ]);
        }

        Auth::login($user);
    }
}
