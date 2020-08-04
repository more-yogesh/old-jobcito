<?php

namespace App\Http\Controllers;

use App\User;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;

class SocialController extends Controller
{
    public function redirect($provider)
    {
        session(['role' => request('role')]);
        return Socialite::driver($provider)->redirect();
    }

    public function Callback($provider)
    {
        $userSocial = Socialite::driver($provider)->stateless()->user();
        $this->createUser($userSocial, $provider);
        if (session('role') == 'employee') {
            return redirect()->route('employee.dashboard');
        }
        return redirect()->route('employer.dashboard');
    }

    public function createUser($socialUser, $provider)
    {
        $isUser = User::where(['email' => $socialUser->getEmail()])->first();
        if ($isUser) {
            if ($isUser->hasRole('employer')) {
                session(['role' => 'employer']);
            } else {
                session(['role' => 'employee']);
            }
            Auth::login($isUser, true);
        } else {
            $user = User::create([
                'email' => $socialUser->getEmail(),
                'provider_id' => $socialUser->getId(),
                'provider' => $provider,
                'email_verified_at' => Carbon::now()
            ]);
            $user->assignRole(session('role'));

            if (session('role') == 'employee') {
                $user->employee()->create([
                    'name' => $socialUser->getName(),
                    'city_id' => '354'
                ]);
            } else {
                $user->employerProfile()->create([
                    'name' => $socialUser->getName(),
                    'city_id' => '354'
                ]);
            }
            Auth::login($user, true);
        }
    }
}
