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
        
        if ($datafim == "" && $datainicio == "")
        {
            $datafim = date('Y-m-d H:i');
            
            $datainicio = date('Y-m-d H:i');
            
            return $datafim . '<br>' . $datainicio;
            
            $mov = \r2b\Movimentacao::wherePlaca($placa)->get();
        }
        
        //return $mov;
        return view('movimentacao.movimentacao_detalhe')->with(array('mov'=>$mov,'placa'=>$placa));
    }
    
}