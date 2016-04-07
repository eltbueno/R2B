<?php namespace r2b\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Request;
class VeiculoController extends Controller{
    public function busca (){        
                     
        $placa = Request::input('placa');        
        $chassi = Request::input('chassi');
        
                   
        if ($placa == "" && $chassi == "")
        {  
            $veiculos = DB::select('select  * from veiculos ');             
        }      
        elseif ($placa != "" && $chassi == "" ) 
        {
            $veiculos = DB::select('select  * from veiculos where placa = ?',[$placa]); 
        }
        elseif ($placa == "" && $chassi != "" ) 
        {
            $veiculos = DB::select('select  * from veiculos where chassi = ?',[$chassi]); 
        }
        elseif ($placa != "" && $chassi != "" ) 
        {
            $veiculos = DB::table('veiculos')                       
                ->where('placa','=',$placa)
                ->where('chassi','=',$chassi)
                ->get(); 
        }
            
            
        return view('veiculo/veiculo_mostra')->with('veiculos',$veiculos);
        
        
    }
    
    public function edita()
        {
        $placa = Request::input('placa'); 
        $veiculos = DB::select('select  * from veiculos where placa = ?',[$placa]);
        return view('veiculo/veiculo_edita')->with('veiculos',$veiculos);
        }


    
    public function adiciona(){       
        $placa = Request::input('placa');
        $chassi = Request::input('chassi');
        $renavan = Request::input('renavan');
        $anomod = Request::input('anofab');
        $anofab = Request::input('anomod');
        $grupo = Request::input('grupo');
        
        DB::insert('insert into veiculos
          (placa, chassi, renavan, anofab , anomod, grupo) 
          values (?,?,?,?,?,?)',
          array ($placa, $chassi, $renavan, $anomod,$anofab,$grupo)
          );  
         return view('/veiculo/veiculo_confirma');
        }




public function atualiza(){
        
        $placa = Request::input('placa');
        $chassi = Request::input('chassi');
        $renavan = Request::input('renavan');
        $anofab = Request::input('anofab');
        $anomod = Request::input('anomod');
        $grupo = Request::input('grupo');
             
        
         DB::table('veiculos')
                ->where('placa',$placa)
                ->update(['placa'=>$placa, 'chassi'=>$chassi,'renavan'=>$renavan,
                    'anofab'=>$anofab,'anomod'=>$anomod,'grupo'=>$grupo]);        
        
        return view('/veiculo/veiculo_confirma');
    }
    public function apaga($placa){        
       DB::table('veiculos')->where('placa','=',$placa)->delete();
        
        //$veiculo = new \r2b\Veiculo;
        //$veiculo->find($placa)->delete();
        return view('/veiculo/veiculo_confirma');
    }
    
    

}