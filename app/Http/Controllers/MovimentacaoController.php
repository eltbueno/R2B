<?php namespace r2b\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Request;
class MovimentacaoController extends Controller{
    
    public function __construct() {
        $this->middleware('auth');
        
    }
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
             $mov = \r2b\Movimentacao::wherePlacaAndAtivo( $placa, 1)->get(); 
        //    $mov = DB::table('movimentacoes')
        //            ->where('placa','=',$placa)
        //            ->where('ativo','=','1')
        //            ->get();
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
        $status2 = DB::select('select * from status');   
        $placa = Request::input('placa');
        $datainicio = Request::input('data_inicio');
        $datafim = Request::input('data_fim');
        //$datainicio = date('Y-m-d H:i' ,strtotime($datainicio)) ;
        //$datafim = date('Y-m-d H:i' ,strtotime($datafim)) ;
        //return $datainicio . ' inicio <br> fim' . $datafim; 
        
        if ($datafim == "" && $datainicio == "")
        {
            // pc do elton a hora esta adiantada em 3 horas
            // no servidor da amazon está correta
            // procurar depois acertar no pc
            // busca abaixo retorna as movimentações de 3 meses atras da placa especificada
            $datafim = date('Y-m-d H:i');            
            $datainicio = date('Y-m-d H:i' ,strtotime($datafim. '- 365 days')) ;            
            //return $datafim . '<br>' . $datainicio;            
            
            //$mov = \r2b\Movimentacao::wherePlacaAndData_inicio($placa,'>=',$datainicio)->get();
            $mov = \r2b\Movimentacao::where('placa','=',$placa)
                    ->where('data_inicio','>=',$datainicio)
                    ->get(); 
            //return $mov;
        }elseif($datafim != "" && $datainicio == "")
        {
            $datainicio = date('Y-m-d H:i' ,strtotime($datafim.'+ 23 hours + 59 minutes')) ;            
            //return $datafim;
            $mov = \r2b\Movimentacao::where('placa','=',$placa)
                    ->where('data_inicio','<=',$datainicio)
                    ->get();            
        }elseif($datafim == "" && $datainicio != "")
        {
            $datainicio = date('Y-m-d H:i' ,strtotime($datainicio)) ; 
            $datafim = date('Y-m-d H:i');
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
                    ->where('data_inicio','<=',$datafim)
                    ->get();            
        }
        
        $ativo = \r2b\Movimentacao::whereAtivoAndPlaca(1, $placa)->get();
        
        //return $mov;
        return view('movimentacao.movimentacao_detalhe')
                ->with(array('mov'=>$mov,
                             'placa'=>$placa,
                             // 'data_inicio'=>$datainicio,
                             // 'data_fim'=>$datafim
                                'ativo'=>$ativo,
                                'status'=>$status2
                            ));
    }
    
    
    public function novo()
    {
        $modulo = 'movimentacao';
        $ativo = 1;
        $placa = Request::input('placa');
        $data = Request::input('data');
        $hora = Request::input('hora');
        $km = Request::input('km');
        $combustivel = Request::input('combustivel');
        $status = Request::input('status');
        $novadata = date('Y-m-d H:i' ,strtotime($data . $hora)) ;
        
        DB::table('movimentacoes')
                ->where('placa',$placa)
                ->where('ativo',1)
                ->update([
                    'data_fim'=>$novadata,
                    'ativo'=>0,
                    'kmfim'=>$km,
                    'combustivelfim'=>$combustivel
                    ]);
        
        DB::insert('insert into movimentacoes
                (placa,km,data_inicio,combustivel,status_id,modulo,ativo)
                values(?,?,?,?,?,?,?)',
                array($placa,$km,$novadata,$combustivel,$status,$modulo,$ativo)
                );
        
        
        
        
        return view('movimentacao.movimentacao_confirma');
    }
    
}