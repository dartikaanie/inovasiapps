<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Redirect;

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
        $log = $request->all();
        $this->validate($request, [
            'email' => 'required|string',
            'password' => 'required|string',
        ]);

        $ipldap = "ldap://10.15.3.120";
        $mydomain = 'SMIG';
        $dcName = "dc=SMIG,dc=CORP";
        $ldap = ldap_connect($ipldap, 389);

        $username = $log['email'];
        $password = $log['password'];

        $ldaprdn = $mydomain . "\\" . $username;
        ldap_set_option($ldap, LDAP_OPT_PROTOCOL_VERSION, 3);
        ldap_set_option($ldap, LDAP_OPT_REFERRALS, 0);

        $bind = @ldap_bind($ldap, $ldaprdn, $password);
        if ($bind) {
            $filter = "(sAMAccountName=$username)";
            $result = ldap_search($ldap, $dcName, $filter);
//            $info = ldap_get_entries($ldap, $result);
            ldap_close($ldap);
//            dd($info);
            $user = User::where('email', strtoupper($log['email']))->first();
            if ($user) {
                Auth::login($user);

                return \redirect('/home');
            } else {
                echo "<script>alert('Anda Tidak Memiliki Hak Akses Ke Aplikasi');history.go(-1);</script>";
//            return \redirect('/');
            }
        } else {

            if (Auth::attempt(['email' => $log['email'], 'password' => $log['password']])) {
                return \redirect('/home');
            } else {
                echo "<script>alert('Username Dan Password Salah');history.go(-1);</script>";
            }
        }
    }
}
