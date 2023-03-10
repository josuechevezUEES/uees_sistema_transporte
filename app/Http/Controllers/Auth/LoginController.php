<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Class\Usuario;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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
     * Show the application's login form.
     *
     * @return \Illuminate\View\View
     */
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $usuario_class = $this->buscar_usuario_class($request);

        if ($usuario_class) :

            $usuario = User::where('email', $usuario_class->email)
                ->get()
                ->first();

            if ($usuario) :
                $this->class_loginUsingId($usuario);
            endif;

            return redirect()
                ->route('home');
        endif;

        return redirect()
            ->route('login');
    }


    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Buscar usuario en db class
     *
     * @param Request $request
     * @return object
     */
    public function buscar_usuario_class(Request $request)
    {
        $usuario = [
            $request->usuario,
            $request->password
        ];

        $usuario_class = DB::connection('sqlsrv')
            ->select(
                "SELECT
                    USRUID as usuario_id,
                    USRUID as name,
                    USREML as email
                FROM
                    USUARIOS
                WHERE
                    USRUID = ? COLLATE SQL_Latin1_General_CP1_CI_AS
                AND
                    DBO.fnLeeClave(USRPWD) = ? COLLATE SQL_Latin1_General_CP1_CI_AS",
                $usuario
            );

        return isset($usuario_class[0]) ? $usuario_class[0] : "";
    }

    /**
     * Crear session de usuario
     *
     * @param object $usuario
     * @return boolean
     */
    public function class_loginUsingId($usuario)
    {
        return auth()
            ->loginUsingId($usuario->id);
    }
}
