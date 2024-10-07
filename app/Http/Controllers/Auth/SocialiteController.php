<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Mail\WelcomeUser;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\RedirectResponse;
use Illuminate\Auth\Events\Registered;
use Laravel\Socialite\Facades\Socialite;

class SocialiteController extends Controller
{
    public function loginSocial(Request $request, string $provider): RedirectResponse
    {
        $this->validateProvider($request);
 
        return Socialite::driver($provider)->redirect();
    }
 
    public function callbackSocial(Request $request, string $provider)
    {
        $this->validateProvider($request);
 
        $response = Socialite::driver($provider)->user();
 
        $user = User::updateOrCreate(
            ['email' => $response->getEmail()],
            [
                'password' => Str::password(),
                'name' => $response->getName() ?? $response->getNickname,
                $provider . '_id' => $response->getId()
            ]
        );
        $data = [$provider . '_id' => $response->getId()];
 
        if ($user->wasRecentlyCreated) {
            $data['name'] = $response->getName() ?? $response->getNickname();
 
            event(new Registered($user));

            Mail::to($user->email)->send(new WelcomeUser($user));
        }
 
        $user->update($data);
 
        Auth::login($user, remember: true);
 
        // return redirect()->intended(RouteServiceProvider::HOME);
    }
 
    protected function validateProvider(Request $request): array
    {
        return $this->getValidationFactory()->make(
            $request->route()->parameters(),
            ['provider' => 'in:google']
        )->validate();
    }
}
