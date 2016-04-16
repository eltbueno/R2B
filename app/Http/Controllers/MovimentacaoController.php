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
            $mov = DB::select('select * from movimentacoes where placa = ?',[$placa]); 
            //return $mov;
        }
        else  
        {
         //  return $status;
          $mov = DB::select('select * from movimentacoes where status_id = ?',[$status]); 
          //return $mov;
        } 
        //$dados = array(
        //         $status2, 
        //        $mov
        //        );
        //($placa == "" && $status != "" )               
       return view('movimentacao.movimentacao_mostra')->with(array('mov'=>$mov,'status'=>$status2));
       // return view('movimentacao.movimentacao_mostra',compact('mov','status'));
    }
    
}