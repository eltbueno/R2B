<?php

namespace r2b\Http\Controllers;
use r2b\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use r2b\Http\Requests\ValidaUser;
use Validator;

class UserController extends Controller{
    // comentado para liberar o cadastro de usuario
    public function __construct() {
        $this->middleware('auth');
        
    }
    
    public function principal() {
        return view('/principal');
        
    }
    
    
    public function user() {
        
        return view('auth/register');
        
    }
    public function usuario(Request $request) {
        $this->authorize('admin');
        $message = $request->message;
        
        return view('auth/usuario')->with("message",$message);
        
    }
    
    
    public function salva(ValidaUser $formuser) {
        //return "chegou aqui";
        
        $validator = Validator::make(
                $formuser->all(), 
                $formuser->rules(),
                $formuser->messages()
                );
        if ($validator->valid())
        {
            $id = DB::table('users')->insertGetId
                (
                    [
                        'nome'=>$formuser->nome,
                        'login'=>$formuser->login,
                        'email'=>$formuser->email,
                        'password'=>bcrypt($formuser->password),
                        'remember_token'=>str_random(100),
                        'perfil'=>$formuser->perfil
                        
                    ]
                );
            
        $usuario = DB::select('select  * from users where id = ?',[$id]);
        //return ("cadastrou o user");
        $message = 3;
        return view('auth.usuario_edita')->with(array('usuario'=>$usuario,'message'=>$message)); 
        }
    }
    
    public function busca(Request $request) {
        $message = $request->message;
        $nome = $request->nome;
        $perfil = $request->perfil;
        
        if(empty($nome)&& empty($perfil))
        {
            $usuarios = User::all();      
            //return $usuarios;
            return view('auth.usuario')
            ->with(array(                
                'usuarios'=> $usuarios,
                "message"=> $message
            ));
        }                     
        
        elseif (empty($perfil)&& !empty($nome) )
        {
            $usuarios = \r2b\User::where('nome','like','%'.$nome.'%')->get(); 
            //return $usuarios;
            return view('auth.usuario')
            ->with(array(                
                'usuarios'=> $usuarios,
                "message"=> $message
            ));
        }
        elseif (!empty($perfil)&& empty($nome) )
        {
            $usuarios = \r2b\User::wherePerfil($perfil)->get(); 
            return view('auth.usuario')
            ->with(array(                
                'usuarios'=> $usuarios,
                "message"=> $message
            ));
        }        
    }
    public function detalhe(Request $request)
    {
        $id = $request->id;
        $message = $request->message;
        $usuario = \r2b\User::whereId($id)->get();        
        return view ('auth/usuario_edita')
                ->with(array(
                    'usuario'=>$usuario,
                    'message'=>$message
                ));
    }
    public function atualiza(Request $request)
    {
        $id = $request->id;
        $nome = $request->nome;
        $email = $request->email;
        //$password = bcrypt($request->password);
        $password = $request->password;
        $perfil = $request->perfil;
        
        if ($password == "")
        {
           DB::table('users')
                ->where('id',$id)
                    ->update(
                    [
                        'nome'=>$nome, 
                        'email'=>$email,
                        
                        'perfil'=>$perfil
                            
                    ]);  
        }
        else
        {
        $password = bcrypt($password);
         DB::table('users')
                ->where('id',$id)
                    ->update(
                    [
                        'nome'=>$nome, 
                        'email'=>$email,
                        'password'=>$password,
                        'perfil'=>$perfil
                            
                    ]);                        
        }
        $usuario = \r2b\User::whereId($id)->get();        
        
        $message = 2;
        return view('auth.usuario_edita')->with(array('usuario'=>$usuario,'message'=>$message));        
    }
    public function apaga($id) 
    {
        $contratos = \r2b\Contrato::whereUser_id($id)->get();
        $cont = count($contratos);
        
        if($cont == 0)
        {
            
            //DB::table('users')->where('id','=',$id)->delete();
            
            return redirect()->action('UserController@usuario',
                            [
                                'message'=> 1
                            ]);
           // return view('auth.usuario')->with('message',$message);
        }
        else
        {
            return redirect()->action('UserController@detalhe',
                            [
                                'id'=>$id,
                                'message'=> 1
                            ]);
        }
        
    }
}