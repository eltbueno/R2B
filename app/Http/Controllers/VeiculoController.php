<?php namespace r2b\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Request;

// os dois abaixo são usados na validação do formulario de cadastro.
use r2b\Http\Requests\ValidaVeiculo;
use Validator;

class VeiculoController extends Controller{
    public function __construct() {
        $this->middleware('auth');
        
    }
    
    public function novo()
    {
        return View("veiculo.veiculo_novo");
    }
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
            
            
        return view('veiculo/veiculo')->with('veiculos',$veiculos);
        
        
    }
    
    public function edita()
        {
        $placa = Request::input('placa'); 
        
        $veiculos = DB::select('select  * from veiculos where placa = ?',[$placa]);
        return view('veiculo/veiculo_edita')->with('veiculos',$veiculos);
        }


    
    public function adiciona(ValidaVeiculo $formveiculo){   
        
        
        $validator = Validator::make(
                $formveiculo->all(), 
                $formveiculo->rules(),
                $formveiculo->messages()
                );
        
        if ($validator->valid())
        {
            return "ok";
        }
        
        
        $placa = Request::input('placa');
        $chassi = Request::input('chassi');
        $renavan = Request::input('renavan');
        $anomod = Request::input('anofab');
        $anofab = Request::input('anomod');
        $grupo = Request::input('grupo');
        //$carro = "";
        //$carro2 = "";
        $carro = DB::select('select * from veiculos where placa = ?',[$placa]);
        $carro2 = DB::select('select  * from veiculos where chassi = ?',[$chassi]);
        
        //$datateste = '2016-01-01 08:00';
        //return $datateste;
        
        
        if(!empty($carro))
        {
            //return 'placa já existe';
            return redirect()->back();
        }
        elseif (!empty($carro2))
        {
            return 'chassi já existe';
        }
        
        else {
        DB::insert('insert into veiculos
          (placa, chassi, renavan, anofab , anomod, grupo) 
          values (?,?,?,?,?,?)',
          array ($placa, $chassi, $renavan, $anomod,$anofab,$grupo)
          );
        
        
        $movimentacao = new \r2b\Movimentacao;
        $movimentacao->placa = $placa;
        $movimentacao->modulo = 'veiculo';
        $movimentacao->ativo = 1;
        $movimentacao->data_inicio = '2016-01-01 08:00';
        $movimentacao->km = 0;
        $movimentacao->combustivel = 0;
        $movimentacao->status_id =1;
        $movimentacao->save();
        
         return view('/veiculo/veiculo_confirma');
        }
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