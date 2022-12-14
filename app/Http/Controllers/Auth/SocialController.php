<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Socialite;
Use \Carbon\Carbon;
use URL;
use Auth;
use App\Models\User;

class SocialController extends Controller
{


    use AuthenticatesUsers;

    protected $redirectTo = '/';

    protected function redirectTo()
    {
        $finalRedirectionTo = \Session::get('url.intended', $this->redirectTo);
        return $finalRedirectionTo;
    }



    public function __construct()
    {
        session(['url.intended' => url()->previous()]);
        $this->redirectTo = session()->get('url.intended');

        $this->middleware('guest')->except('logout');
    }



    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function handleProviderCallback($provider)
    {
        $user = Socialite::driver($provider)->stateless()->user();
        $authUser = $this->findOrCreateUser($user,$provider);

        Auth::login($authUser,true);
        return redirect($this->redirectTo);
    }

    public function findOrCreateUser($user,$provider)
    {
        $authUser = User::where('email',$user->email)->first();
        if($authUser){
            return $authUser;
        }
        return User::firstOrCreate([
            'name' => $user->name,
            'email' => $user->email,
            // 'provider' => strtoupper($provider),
            // 'provider_id' => $user->id,
            'email_verified_at' => Carbon::now()->timestamp

        ]);
    }
}
