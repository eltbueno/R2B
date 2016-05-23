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
            //$veiculos = DB::select('select  * from veiculos where chassi = ?',[$chassi]); 
            $veiculos = DB::table('veiculos')                       
                ->where('chassi','like','%'.$chassi.'%')
                ->get(); 
            
            
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
        
        $veiculo = DB::select('select  * from veiculos where placa = ?',[$placa]);
        return view('veiculo/veiculo_edita')->with('veiculo',$veiculo);
        }


    
    public function adiciona(ValidaVeiculo $formveiculo){   
        
        
        $validator = Validator::make(
                $formveiculo->all(), 
                $formveiculo->rules(),
                $formveiculo->messages()
                );
        
        if ($validator->valid())
        {
            //return $formveiculo->placa;
       
            DB::insert('insert into veiculos
              (placa, chassi, renavan, anofab , anomod, grupo) 
              values (?,?,?,?,?,?)',
              array ($formveiculo->placa, 
                  $formveiculo->chassi, 
                  $formveiculo->renavan, 
                  $formveiculo->anofab,
                  $formveiculo->anomod,
                  $formveiculo->grupo)
              );


            $movimentacao = new \r2b\Movimentacao;
            $movimentacao->placa = $formveiculo->placa;
            $movimentacao->modulo = 'veiculo';
            $movimentacao->ativo = 1;
            $movimentacao->data_inicio = '2016-01-01 08:00';
            $movimentacao->km = 0;
            $movimentacao->combustivel = 0;
            $movimentacao->status_id =1;
            $movimentacao->save();

            $veiculo = DB::select('select  * from veiculos where placa = ?',[$formveiculo->placa]);
            $message = "Cadastrado com Sucesso";
            return view('/veiculo/veiculo_edita')->with(array('veiculo'=>$veiculo,'message1'=>$message));
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
        
        $veiculo = DB::select('select  * from veiculos where placa = ?',[$placa]);
        $message = "Alterado com Sucesso";
        return view('/veiculo/veiculo_edita')->with(array('veiculo'=>$veiculo,'message1'=>$message));
    }
    
    public function apaga($placa){ 
        $cont = 0;
        $movimentacoes = \r2b\Movimentacao::wherePlaca($placa)->get();
        foreach ($movimentacoes as $movimentacoes)
        {
            $cont++;
            $idmov = $movimentacoes->id;
            $placa = $movimentacoes->placa;
        }
        if($cont > 1)
        {
            
            return redirect()->action('VeiculoController@apagaerro',['placa'=>$placa]);
        }
            
        else
        {
            //return $idmov;
            DB::table('movimentacoes')->where('id','=',$idmov)->delete();
            DB::table('veiculos')->where('placa','=',$placa)->delete();
            return redirect()->action('VeiculoController@apagaconfirma');
            
        }
            
        return $cont;
        
        DB::table('veiculos')->where('placa','=',$placa)->delete();        
    }
    
    public function apagaconfirma() 
    {
        $message = "Apagado com Sucesso";
        return view('veiculo.veiculo')->with('message',$message);
    }    
    
    public function apagaerro()
    {
        $placa = Request::input('placa'); 
        $veiculo = DB::select('select  * from veiculos where placa = ?',[$placa]);
        
        $message = "Não é possível apagar, Veiculo possui Movimentações";
        //return $cliente;
        return view('veiculo.veiculo_edita')
               ->with(array
                (
                    'veiculo'=>$veiculo,
                    'message'=>$message                        
                ));
    }

}