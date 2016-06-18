<?php

namespace r2b\Http\Controllers\Auth;

use r2b\User;
use Validator;
use r2b\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Http\Request;
use Auth;
class AuthController extends Controller
{
    use AuthenticatesAndRegistersUsers, ThrottlesLogins;
    
    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    
    // comentado para libera o cadastro de usuario
    //public function __construct()
    //{
    //    $this->middleware('guest', ['except' => 'getLogout']);
    //}

    public function postRegister(Request $request) {
        //return 'aqui deu certo';
        $user = new User;
        
        $user->nome = $request->nome;
        $user->perfil = $request->perfil;
        $user->login = $request->login;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->remember_token = str_random(100);
        $user->save();
        return 'aqui deu certo';
        return redirect('usuario_novo')
            ->with("message","Registrado com Sucesso");
        
    }
    
    
    public function postLogin(Request $request)
    {
        //foreach ($request as $p)
        //    return $request->password;
        
        
        if(Auth::attempt(
                //return "ate aqui veio";
                
                [
                    'login'=>$request->username,
                    'password'=>$request->password
                ]
                ))
        {
            //return "ok";
            //return redirect()->intended($this->redirectPath());
            return redirect()->to('principal');
        }
        else
        {
           // $validacao = Validator::make($request->all());
            //return redirect('auth/login');
            return redirect('/auth/login')
            ->with("message","Usuário e/ou senha inválido(s)");
        }
        
    }
}
