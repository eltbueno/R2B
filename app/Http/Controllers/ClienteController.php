<?php namespace r2b\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Request;
class ClienteController extends Controller{
    public function __construct() {
        $this->middleware('auth');
        
    }
    public function cliente()
    {
        return view('cliente.cliente');
    }
    
    
    public function busca (){        
        //incluir uma função aqui para verificar os valores, depois faz a busca
                
        $id = Request::input('id');        
        $nome = Request::input('cli_nome');
        $tipo = Request::input('cli_tipo');
        $contrato = Request::input('contrato');           
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
            
        if ($contrato == "")
        {
            //return view('cliente/cliente_mostra')->with('clientes',$clientes);
            return view('cliente/cliente')->with('clientes',$clientes);
        }
        else
        {
            return view('contrato.busca_cli')->with('clientes',$clientes);
        }
        
        
        
    }
    
    public function edita()
        {
        $id = Request::input('id'); 
        $clientes = DB::select('select  * from clientes where id = ?',[$id]);
        //return  $clientes;
        
        return view('cliente/cliente_edita')->with('clientes',$clientes);
        return redirect()->to('cliente/cliente_edita', ['clientes'=>$clientes]);
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
        DB::insert('insert into clientes
          (cli_nome, cli_end,cli_end_num,cli_end_com,cli_bairro,cli_cidade,cli_estado,cli_cep,cli_tel,cli_obs,cli_tipo) 
          values (?,?,?,?,?,?,?,?,?,?,?)',
          array ($nome, $endereco, $numero, $comp,$bairro,$cidade,$estado,$cep,$tel,$obs,$tipo)
          );  
         return view('/cliente/cliente_confirma');
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
        
        return view('/cliente/cliente_confirma');
    }
    
    public function apaga($id){        
        $cliente = new \r2b\Cliente;
        
        $contrato = \r2b\Contrato::whereCliente_id($id)->get();
        
        
        foreach($contrato as $p)
        {
            if(!empty( $p->cliente->id))
            {
                //return $p->cliente->id;
                return "Cliente Possui contrato, impossível apagar";
            }          
        }
        
        
        $cliente->find($id)->delete();
        return view('/cliente/cliente_confirma');
    }

}
