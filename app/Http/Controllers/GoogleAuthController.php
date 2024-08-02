<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;

class GoogleAuthController extends Controller
{
    // Redirect to Google for authentication
    public function redirect()
    {
        return Socialite::driver('google')->redirect(['prompt' => 'select_account']);
    }

    // Callback function after authentication
    public function callbackGoogle()
    {
        try {
            $google_user = Socialite::driver('google')->user();
          

            // Proceed with user authentication
            $user = User::where('google_id', $google_user->getId())->first();
            if (!$user) {
                $new_user = new User([
                    'name' => $google_user->getName(),
                    'email' => $google_user->getEmail(),
                    'google_id' => $google_user->getId(),
                ]);

                $new_user->save();
                auth()->login($new_user);
                return redirect()->intended('/');
            } else {
                auth()->login($user);
                return redirect()->intended('/');
            }
        } catch (\Throwable $th) {
            dd('Something went wrong' . $th->getMessage());
            return redirect('/login');
        }
    }
}
