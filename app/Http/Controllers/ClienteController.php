<?php namespace r2b\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Request;
class ClienteController extends Controller{
    public function busca (){        
        //incluir uma função aqui para verificar os valores, depois faz a busca
                
        $id = Request::input('cli_id');        
        $nome = Request::input('cli_nome');
        $tipo = Request::input('cli_tipo');
                   
        if ($id == "" && $nome == "" && $tipo == "" )
        {  
            $clientes = DB::select('select  * from clientes ');             
        }      
        elseif ($id != "" && $nome == "" && $tipo == "" ) 
        {
            $clientes = DB::select('select  * from clientes where cli_id = ?',[$id]); 
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
                ->where('cli_id','=',$id)
                ->where('cli_nome','like','%'.$nome.'%')
                ->get();                                      
        }
        
        elseif ($id != "" && $nome == "" && $tipo != "" )
        {                     
            $clientes = DB::table('clientes')
                ->where('cli_id','=',$id)                       
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
                ->where('cli_id','=',$id)
                ->where('cli_nome','like','%'.$nome.'%')
                ->where('cli_tipo','=',$tipo)
                ->get();                                      
        }           
            
        return view('cliente/cliente_mostra')->with('clientes',$clientes);
        
        
    }
    
    public function edita()
        {
        $id = Request::input('cli_id'); 
        $clientes = DB::select('select  * from clientes where cli_id = ?',[$id]);
        //return  $id;
        return view('cliente/cliente_edita')->with('clientes',$clientes);
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
        
        $id = Request::input('cli_id');
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
                ->where('cli_id',$id)
                ->update(['cli_nome'=>$nome, 'cli_end'=>$endereco,'cli_end_num'=>$$numero,
                    'cli_end_com'=>$comp,'cli_bairro'=>$bairro,'cli_cidade'=>$cidade,
                    'cli_estado'=>$estado,'cli_cep'=>$cep,'cli_tel'=>$tel,'cli_obs'=>$obs,'cli_tipo'=>$tipo]);        
        
        return "Alterado com sucesso";
    }

}
