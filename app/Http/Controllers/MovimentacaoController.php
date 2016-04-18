<?php namespace r2b\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Request;
class MovimentacaoController extends Controller{
    public function buscastatus(){
        $status = DB::select('select * from status'); 
        return view('movimentacao.movimentacao')->with('status',$status);
    }
    
    public function busca (){   
        $status2 = DB::select('select * from status');        
        $placa = Request::input('placa');        
        $status = Request::input('status_id');         
        if ($placa != "" && $status == "" )         {
            //$mov = DB::select('select * from movimentacoes where placa = ?',[$placa]); 
            
            $mov = DB::table('movimentacoes')
                    ->where('placa','=',$placa)
                    ->where('ativo','=','1')
                    ->get();
        }
        else  
        { 
            // buscando as movimentações, filtro por status e se esta ativo
            $mov = \r2b\Movimentacao::whereStatus_idAndAtivo( $status, 1)->get();
        
        } 
                      
       return view('movimentacao.movimentacao_mostra')->with(array('mov'=>$mov,'status'=>$status2));
       
    }
    
    public function detalhe()
    {
        $placa = Request::input('placa');
        $datainicio = Request::input('data_inicio');
        $datafim = Request::input('data_fim');
        //return $datafim . '<br>' . $datainicio; 
        if ($datafim == "" && $datainicio == "")
        {
            // pc do elton a hora esta adiantada em 3 horas
            // no servidor da amazon está correta
            // procurar depois acertar no pc
            // busca abaixo retorna as movimentações de 3 meses atras da placa especificada
            $datafim = date('Y-m-d H:i');            
            $datainicio = date('Y-m-d H:i' ,strtotime($datafim. '- 90 days')) ;            
            //return $datafim . '<br>' . $datainicio;            
            $mov = \r2b\Movimentacao::where('placa','=',$placa)
                    ->where('data_inicio','>=',$datainicio)
                    ->get();            
        }elseif($datafim != "" && $datainicio == "")
        {
            $datafim = date('Y-m-d H:i' ,strtotime($datafim.'+ 23 hours + 59 minutes')) ;            
            //return $datafim;
            $mov = \r2b\Movimentacao::where('placa','=',$placa)
                    ->where('data_fim','<=',$datafim)
                    ->get();            
        }elseif($datafim == "" && $datainicio != "")
        {
            $datainicio = date('Y-m-d H:i' ,strtotime($datainicio)) ; 
            //return $datainicio;
            $mov = \r2b\Movimentacao::where('placa','=',$placa)
                    ->where('data_inicio','>=',$datainicio)
                    ->get();            
        }else
        {
            $datafim = date('Y-m-d H:i' ,strtotime($datafim.'+ 23 hours + 59 minutes')) ;
            $datainicio = date('Y-m-d H:i' ,strtotime($datainicio)) ;
            $mov = \r2b\Movimentacao::where('placa','=',$placa)
                    ->where('data_inicio','>=',$datainicio)
                    ->where('data_fim','<=',$datafim)
                    ->get();            
        }
        
        
        //return $mov;
        return view('movimentacao.movimentacao_detalhe')->with(array('mov'=>$mov,'placa'=>$placa));
    }
    
}