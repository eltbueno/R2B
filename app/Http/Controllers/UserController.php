<?php

namespace r2b\Http\Controllers;
use r2b\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class UserController extends Controller{
    
    public function __construct() {
        $this->middleware('auth');
        
    }
    
    public function principal() {
        return view('/principal');
        
    }
    
    public function user() {
        return view('auth/register');
        
    }
    
    public function salva(Request $request) {
        //return 'aqui deu certo';
        $user = new User;
        
        $user->nome = $request->nome;
        $user->perfil = $request->perfil;
        $user->login = $request->login;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->remember_token = str_random(100);
        $checauser = DB::select('select  * from users where login = ?',[$user->login]);
        //$checauser = \r2b\User::whereLogin($user->login)->get();
        
        //return $checauser->login;
        if (!empty($checauser))
        {
            return 'Login já existe';
        }
        else
        {
            $user->save();
        }
        
        
        
        return redirect('usuario_novo')
            ->with("message","Registrado com Sucesso");
        
    }
    
    public function busca(Request $request) {
        $nome = $request->nome;
        $perfil = $request->perfil;
        
        if(empty($nome)&& empty($perfil))
        {
            $usuarios = User::all();      
            //return $usuarios;
            return redirect('usuario')
            ->with(array(
                'message'=>"Clique para editar",
                'usuarios'=> $usuarios
            ));
        }                     
        
        elseif (empty($perfil)&& !empty($nome) )
        {
            $usuarios = \r2b\User::where('nome','like','%'.$nome.'%')->get(); 
            return redirect('usuario')
            ->with(array(
                'message'=>"Clique para editar",
                'usuarios'=> $usuarios
            ));
        }
        elseif (!empty($perfil)&& empty($nome) )
        {
            $usuarios = \r2b\User::wherePerfil($perfil)->get(); 
            return redirect('usuario')
            ->with(array(
                'message'=>"Clique para editar",
                'usuarios'=> $usuarios
            ));
        }
        
    }
}