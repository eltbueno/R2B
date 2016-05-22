<?php namespace r2b\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Request;
class ClienteController extends Controller{
    
    public function cliente ()
    {
        return view('cliente.cliente');
    }
    public function busca (){        
        //incluir uma função aqui para verificar os valores, depois faz a busca
                
        $id = Request::input('id');        
        $nome = Request::input('cli_nome');
        $tipo = Request::input('cli_tipo');
                   
        if ($id == "" && $nome == "" && $tipo == "" )
        {  
            $clientes = DB::select('select  * from clientes ');             
        }      
        elseif ($id != "" && $nome == "" && $tipo == "" ) 
        {
            $clientes = DB::select('select  * from clientes where id = ?',[$id]); 
        }
        elseif ($id == "" && $nome == "" && $tipo != "" ) 
        {
            $clientes = DB::select('select  * from clientes where cli_tipo = ?',[$tipo]); 
        }
        elseif ($id == "" && $nome != "" && $tipo == "" ) 
        {
            $clientes = DB::table('clientes')                       
                ->where('cli_nome','like','%'.$nome.'%')
                ->get(); 
        }
        elseif ($id != "" && $nome != "" && $tipo == "" )
        {                     
            $clientes = DB::table('clientes')
                ->where('id','=',$id)
                ->where('cli_nome','like','%'.$nome.'%')
                ->get();                                      
        }
        
        elseif ($id != "" && $nome == "" && $tipo != "" )
        {                     
            $clientes = DB::table('clientes')
                ->where('id','=',$id)                       
                ->where('cli_tipo','=',$tipo)
                ->get();                                      
        }
        
        elseif ($id == "" && $nome != "" && $tipo != "" )
        {                     
            $clientes = DB::table('clientes')                
                ->where('cli_nome','like','%'.$nome.'%')
                ->where('cli_tipo','=',$tipo)
                ->get();                                      
        }
        
        
        elseif ($id != "" && $nome != "" && $tipo != "" )
        {                     
            $clientes = DB::table('clientes')
                ->where('id','=',$id)
                ->where('cli_nome','like','%'.$nome.'%')
                ->where('cli_tipo','=',$tipo)
                ->get();                                      
        }           
            
        return view('cliente/cliente')->with('clientes',$clientes);
        
        
    }
    
    public function edita()
        {
        $id = Request::input('id'); 
        //return $id;
        $cliente = DB::select('select  * from clientes where id = ?',[$id]);
        //return  $id;
        return view('cliente/cliente_edita')->with('cliente',$cliente);
        }


    
    public function adiciona(){       
        $nome = Request::input('cli_nome');
        $endereco = Request::input('cli_end');
        $numero = Request::input('cli_end_num');
        $comp = Request::input('cli_end_com');
        $bairro = Request::input('cli_bairro');
        $cidade = Request::input('cli_cidade');
        $estado = Request::input('cli_estado');
        $cep = Request::input('cli_cep');
        $tel = Request::input('cli_tel');
        $obs = Request::input('cli_obs');
        $tipo = Request::input('cli_tipo');        
        
        $id = DB::table('clientes')->insertGetId
        (
            [
                'cli_nome'=>$nome,
                'cli_end'=>$endereco,
                'cli_end_num'=>$numero,
                'cli_end_com'=>$comp,
                'cli_bairro'=>$bairro,
                'cli_cidade'=>$cidade,
                'cli_estado'=>$estado,
                'cli_cep'=>$cep,
                'cli_tel'=>$tel,
                'cli_obs'=>$obs,
                'cli_tipo'=>$tipo
            ]
        );
        //$cliente = \r2b\Cliente::find($id);
        $cliente = DB::select('select  * from clientes where id = ?',[$id]);
         
        return view('/cliente/cliente_edita')->with(array('cliente'=>$cliente));
        
        }




public function atualiza(){
        
        $id = Request::input('id');
        
        $nome = Request::input('cli_nome');
        $endereco = Request::input('cli_end');
        $numero = Request::input('cli_end_num');
        $comp = Request::input('cli_end_com');
        $bairro = Request::input('cli_bairro');
        $cidade = Request::input('cli_cidade');
        $estado = Request::input('cli_estado');
        $cep = Request::input('cli_cep');
        $tel = Request::input('cli_tel');
        $obs = Request::input('cli_obs');
        $tipo = Request::input('cli_tipo');        
        
         DB::table('clientes')
                ->where('id',$id)
                ->update(['cli_nome'=>$nome, 'cli_end'=>$endereco,'cli_end_num'=>$numero,
                    'cli_end_com'=>$comp,'cli_bairro'=>$bairro,'cli_cidade'=>$cidade,
                    'cli_estado'=>$estado,'cli_cep'=>$cep,'cli_tel'=>$tel,'cli_obs'=>$obs,'cli_tipo'=>$tipo]);        
        
        $cliente = DB::select('select  * from clientes where id = ?',[$id]);
        $message1 = "Alterado com Sucesso";
        return view('/cliente/cliente_edita')
                ->with(array(
                    'cliente'=>$cliente,
                    'message1'=>$message1
            ));
        //return view('/cliente/cliente_confirma');
    }
    
    public function apaga($id){
        $contratos = \r2b\Contrato::whereCliente_id($id)->get();
        
        foreach ($contratos as $p)
        {
            if($p->id != "")
            {
                return redirect()->action('ClienteController@apagaerro',['id'=>$id]); 
            }            
        }
        
        $cliente =  new \r2b\Cliente;
        $cliente->find($id)->delete();
        return redirect()->action('ClienteController@apagaconfirma');
    }
    
    public function apagaconfirma()
    {
        $message = "Apagado com Sucesso";
        return view('cliente.cliente')->with('message',$message);
    }
    public function apagaerro()
    {
        $id = Request::input('id'); 
        $cliente = DB::select('select  * from clientes where id = ?',[$id]);
        
        $message = "Não é possível apagar, Cliente possui Contrato";
        //return $cliente;
        return view('cliente/cliente_edita')
               ->with(array
                (
                    'cliente'=>$cliente,
                    'message'=>$message                        
                ));
    }
}
