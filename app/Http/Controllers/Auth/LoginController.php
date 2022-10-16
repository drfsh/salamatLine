<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Traits\ImportCart;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{

    use AuthenticatesUsers, ImportCart;

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
        $authUser = $this->findOrCreateUser($user, $provider);
        Auth::login($authUser, true);
        if (Auth::user() != null)
            $this->import();
        return redirect($this->redirectTo);
    }

    public function findOrCreateUser($user, $provider)
    {
        $authUser = User::where('email', $user->email)->first();
        if ($authUser) {
            return $authUser;
        }
        return User::firstOrCreate([
            'name' => $user->name,
            'email' => $user->email,
            'provider' => strtoupper($provider),
            'provider_id' => $user->id,
            'email_verified_at' => Carbon::now()->timestamp

        ]);
    }

    public function loginByEmail(Request $request)
    {
        $v = Validator::make($request->all(), [
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'string', 'min:8'],
            'captcha' => 'required|captcha'
        ]);
        if ($v->fails()) {
            return response()->json(['true' => false, 'messages' => $v->errors()]);
        } else {
            if (Auth::attempt(['email' => $request->email, 'password' => $request->password,])){
                $this->import();
                return response()->json(['true' => true,'redirect'=> '/profile']);
            }else{
                return response()->json(['true' => false, 'messages' => ['auth'=>[__('auth.failed')]]]);
            }
        }
    }
}
