<?php

namespace App\Http\Controllers\Customer;

use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class SocialiteController
{
    /**
     * @return \Illuminate\Http\RedirectResponse|\Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function facebookRedirect()
    {
        return Socialite::driver('facebook')->redirect();
    }


    /**
     * Create a new controller instance.
     *
     * @return Illuminate\Http\RedirectResponse|\Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function googleRedirect()
    {
        return Socialite::driver('google')->redirect();
    }


    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|void
     */
    public function facebookCallback()
    {
        try {
            return $this->processCallback("facebook", "fb_id", "id");
        } catch (Exception $e) {
            return $this->handleException($e);
        }
    }


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function googleCallback()
    {
        try {
            return $this->processCallback("google", "google_id", "id");
        } catch (Exception $e) {
            return $this->handleException($e);
        }
    }


    protected function processCallback(string $driver, string $field, string $idField = "id")
    {
        $socalialiteUser = Socialite::driver($driver)->user();
        $id = $socalialiteUser->$idField;
        $successRoute = route("customer.dashboard");

        // Already existing social user within this social driver
        if ($user = User::where($field, $id)->first()) {
            Auth::login($user);

            return redirect($successRoute);
        }

        // Already existing user, but not within the social driver
        if ($user = User::where("email", $socalialiteUser->getEmail())->first()) {
            $user->$field = $id;
            $user->save();

            Auth::login($user);

            return redirect($successRoute);
        }

        // New User
        return $this->createUser($socalialiteUser, [
            $field => $id
        ]);
    }


    protected function handleException(Exception $e)
    {
        session()->flash("error", $e->getMessage());

        return redirect(route("login"));
    }


    protected function createUser(\Laravel\Socialite\Contracts\User $socalialiteUser, array $data = [])
    {
        // Create user
        $userData = array_merge([
            'name' => $socalialiteUser->name,
            'email' => $socalialiteUser->email,
            'email_verified_at' => now(),
        ], $data);
        $user = User::create($userData);

        // Login
        Auth::login($user);

        return redirect(route("customer.dashboard"));
    }
}
