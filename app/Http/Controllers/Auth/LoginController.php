<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if(Auth::validate($credentials)) {

            $lastActivityRaw = DB::table('sessions')
            ->join('users', 'users.id', '=', 'sessions.user_id')
            ->selectRaw('sessions.id as session_id, users.id as user_id, sessions.last_activity')
            ->where('users.email', $request->email)
            ->where('sessions.ip_address', '=', $request->ip())
            ->orderBy('sessions.last_activity', 'desc')
            ->first();

            if(!empty($lastActivityRaw)) {

                $sessionTimeout = config('session.lifetime') * 60;

                $remainingTimeInSeconds = $lastActivityRaw->last_activity + $sessionTimeout - time();

                $remainingTimeInMinutes = max(0, round($remainingTimeInSeconds / 60));

                Log::info('remainingTimeInMinutes: ' . $remainingTimeInMinutes);

                if($remainingTimeInMinutes > 0) {

                    session()->put('previous_session', $lastActivityRaw->user_id);

                    return redirect('/session-detection')->with('error', 'Opps! Previous Session Detected.');

                }

            }

            if (Auth::attempt($credentials)) {
  
                return redirect('/home')->with('success', 'Logged In Successfully!');
            }

        }

        return redirect('/login')->with('error', 'Opps! You have entered invalid credentials');
    }

    public function sessionDetection() {

        if(session()->has('previous_session')) {

            return view('session-detection');

        } else {

            return redirect('/login');

        }

    }

    public function sessionContinue(Request $request) {

        $validator = Validator::make($request->all(), [
            'user_id' => ['required']
        ]);
 
        if ($validator->fails()) {

            return redirect('session-detection')->withErrors($validator)->withInput();

        }

        if(session('previous_session') == $request->user_id) {

            session()->forget('previous_session');

            DB::table('sessions')->where('user_id', $request->user_id)->delete();

            Auth::loginUsingId($request->user_id);

            return redirect('/home')->with('success', 'Logged In Successfully!');

        } else {

            return redirect('/session-detection')->with('error', 'Oops! Something went wrong!');

        }

    }
}
