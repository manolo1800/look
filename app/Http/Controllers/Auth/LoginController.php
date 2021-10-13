<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Ldap;
use App\User;

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

    // protected function attemptLogin(Request $request)
    // {


    //     $credentials = $request->only($this->username(), 'password');

    //     $username = trim(strtolower($credentials[$this->username()]));
    //     $password = $credentials['password'];
    //     $ldap_dn = $username.'@labcantv.com.ve';
    //     //var_dump($username);exit;
    //     // $traza = new Traza();
    //     $ldap = new Ldap();

    //     $dc_string = "dc=" . implode(",dc=", $ldap->dc);
    //     $ou_string = "ou=" . implode(",ou=", $ldap->ou);
    //     $ou_usuario = "ou=" . implode(",ou=", $ldap->ouUsuario);
    //     $cadenaConexionUsuario = 'cn=' . $ldap->user . ',' . $ou_string . ',' . $dc_string;
    //     // $cadenaConexionUsuario = 'cn=' . $username. ',' . $ou_string . ',' . $dc_string;
    //     $dn = $ou_usuario . ',' . $dc_string;
    //     $filtro = "(&(objectClass=user)(sAMAccountName=$username))";
    //     $conexion = $ldap->PHPLdap($ldap->host, $ldap->port);
    //     //comentado por git
    //     if ($conexion) {
    //         // dd($cadenaConexionUsuario);
    //         $enlace = $ldap->enlazarPHPLdap($ldap_dn, $password);
    //         if ($enlace) {

    //             $existeUsuarioLDAP = $ldap->existeLDAP($dn, $filtro);

    //             if ($existeUsuarioLDAP) {

    //                 //$verificarRol = $User->verificarRol($dn, $filtro);

    //                 $autenticar = $ldap->autenticarUsuario($dn, $filtro, $password, $ldap);
    //                 // dd($dn);
    //                 if ($autenticar) {
    //                     // dd($filtro);
    //                     $user = \App\User::where($this->username(), $username)->first();
    //                     if (!$user) {

    //                         // el usuario no existe en la base de datos local, por lo que debemos crear uno

    //                         $user = new \App\User();
    //                         $user->username = $username;
    //                         $user->password = bcrypt($password);
    //                         //\Session::get('rol_ldap_descripcion');
    //                         // $user->nombres = \Session::get('nombre');
    //                         // $user->cedula = \Session::get('cedula');
    //                         $user->email = $username . "@cantv.com.ve";
    //                         // $user->id_sap = \Session::get('id_sap');
    //                         $user->rol = 2;
    //                         $user->status = 1;
    //                         $user->home = "/home";
    //                         $user->created_at = date("Y-m-d h:m:s");
    //                         $user->updated_at = date("Y-m-d h:m:s");
    //                     } else {

    //                         $update = User::where('id', '=', $user->id)->first();

    //                         if ($update != null) {
    //                             $update->password = bcrypt($password);
    //                             $update->save();
    //                         }
    //                     }
    //                     //dd('$autentica');
    //                     //guardamos la Traza
    //                     // $traza->username = $username;
    //                     // $traza->fecha_hora = date("Y-m-d h:m:s");
    //                     // $traza->tipo_transaccion = "Inicio de Sesion S.L.";
    //                     // $traza->modulo = "Login";
    //                     // $traza->ip_maquina = $traza->getRealIP();
    //                     // $traza->save();



    //                     $this->guard()->login($user, true);
    //                     return true;
    //                 } else {
    //                     //si el usuario existe / contraseña errada


    //                 }
    //             } else {
    //                 //si el usuario no existe en el ldap

    //                 //valido que este registrado en la tabla user

    //                 $data = [
    //                         'username' => $username,
    //                         'password' => $password
    //                     ];

    //                 if (Auth::attempt($data)) {
    //                     $user = \App\User::where($this->username(), $username)->first();
    //                     //echo $user->status;exit;


    //                     $this->guard()->login($user, true);
    //                     return true;
    //                 }
    //                 //fin validar tabla user

    //                 //si no valido los datos, envio el mensaje de error.

    //             }
    //         } else {
    //         }
    //     } else {
    //     }




    //     // the user doesn't exist in the LDAP server or the password is wrong
    //     // log error
    //     //return false;
    // }
    // public function username()
    // {
    //     return 'username';
    // }
}
