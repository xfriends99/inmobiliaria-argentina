<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Repositories\UserRepository;
use Carbon\Carbon;
use Dotenv\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * @var UserRepository
     */
    private $users;

    public function __construct(UserRepository $users)
    {
        $this->users = $users;
    }

    /**
     * Show the application login form Front End.
     *
     * @return \Illuminate\Http\Response
     */
    public function getLoginFrontend()
    {
        if (Auth::check()){
            return redirect()->route('home');
        }

        return view('frontend.signin');
    }

    /**
     * Handle a login request to the application Front End.
     *
     * @param LoginRequest $request
     * @return \Illuminate\Http\Response
     */
    public function postLoginFrontend(LoginRequest $request)
    {
        //Redirect URL that can be passed as hidden field.
        //$to = $request->has('to') ? "?to=" . $request->get('to') : 'dashboard';
/*
        if ($this->hasTooManyLoginAttempts($request)) {
            return $this->sendLockoutResponse($request, false);
        }*/

        $credentials = $this->getCredentials($request);

        if (! Auth::validate($credentials)) {
/*
            if ($throttles) {
                $this->incrementLoginAttempts($request);
            }*/

            return redirect()->route('signin')->withErrors('Credenciales invalidas');
        }

        $user = Auth::getProvider()->retrieveByCredentials($credentials);
        /*
        if( $user->hasRole('Admin') ){
            return redirect()->back()
                ->withErrors(trans('auth.failed'));
        }

        if ($user->isUnconfirmed()) {
            return redirect()->back()
                ->withErrors(trans('app.please_confirm_your_email_first'));
        }

        if ($user->isUnverified()) {
            return redirect()->back()
                ->withErrors(trans('app.your_account_has_not_yet_been_verified'));
        }

        if ($user->isBanned()) {
            return redirect()->back()
                ->withErrors(trans('app.your_account_is_banned'));
        }*/
        Auth::login($user, true);
        return redirect()->route('home');
        //return $this->handleUserWasAuthenticated($request, $user);
    }

    protected function handleUserWasAuthenticated(Request $request, $user)
    {
/*        if ($throttles) {
            $this->clearLoginAttempts($request);
        }
*/
  /*      if (settings('2fa.enabled') && Authy::isEnabled($user)) {
            return $this->logoutAndRedirectToTokenPage($request, $user);
        }
*/
        $this->users->update($user->id, ['last_login' => Carbon::now()]);

        /*if ($request->has('to')) {
            return redirect()->to($request->get('to'));
        }*/

        return redirect()->intended();
    }

    protected function getCredentials(Request $request)
    {
        return [
            'email' => $request->username,
            'password' => $request->get('password')
        ];
    }

    private function isEmail($param)
    {
        return ! Validator::make(
            ['username' => $param],
            ['username' => 'email']
        )->fails();
    }

    public function getLogout()
    {
        Auth::logout();

        return redirect()->route('signin');
    }


    /**
     * Determine if the user has too many failed login attempts.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return bool
     */
    protected function hasTooManyLoginAttempts(Request $request)
    {
        return app(RateLimiter::class)->tooManyAttempts(
            $request->input($this->loginUsername()).$request->ip(),
            $this->maxLoginAttempts(), $this->lockoutTime() / 60
        );
    }

    /**
     * Increment the login attempts for the user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return int
     */
    protected function incrementLoginAttempts(Request $request)
    {
        app(RateLimiter::class)->hit(
            $request->input($this->loginUsername()).$request->ip()
        );
    }

    public function getRegister()
    {
        return view('frontend.signup');
    }

    public function postRegister(RegisterRequest $request)
    {
        // Add the user to database
        $user = $this->users->create(array_merge(
            $request->only('email', 'phone', 'password', 'name', 'last_name')
        ));

        Auth::login($user, true);

        return redirect()->route('home')->with('success', 'Te has registrado satisfactoriamente');
    }

}
