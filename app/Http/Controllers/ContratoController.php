<?php namespace r2b\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Request;
class ContratoController extends Controller{
    public function __construct() {
        $this->middleware('auth');
        
    }
    public function contrato()
    {
        return view('contrato.contrato');
    }
    public function novo()
    {
        return view('contrato.contrato_novo');
    }
    
    public function busca (){        
        //incluir uma função aqui para verificar os valores, depois faz a busca
                
        $id = Request::input('id');        
        $cli_id = Request::input('cliente_id');
        $cli_nome = Request::input('cliente_nome');
                   
        if ($id == "" && $cli_id == "" && $cli_nome == "" )
        {  
            $contratos = \r2b\Contrato::All();            
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
            
        return view('contrato.contrato')->with('contratos',$contratos);
        
        
    }
    
    public function edita()
        {
        $id = Request::input('id'); 
        $contrato = \r2b\Contrato::whereId($id)->get();
        $veiculos = \r2b\Contrato_Movimenta::whereContrato_id($id)->get();
        //$veiculos = DB::table('contrato_movimenta')
                //->where('contrato_id','=',$id)
                //->get();
        //return  $id;
        return view('contrato.contrato_edita')->with(array('contrato'=>$contrato,'veiculos'=>$veiculos));
        }


    
    public function adiciona(){       
        $tipo = Request::input('tipo');
        $user = Request::input('user_id');
        $cliente = Request::input('cliente_id');
        $vigencia = Request::input('vigencia');
        $taxaadmin = Request::input('taxaadmin');
        $taxamulta = Request::input('taxamulta');
        $vencimento = Request::input('vencimento');
        $vigencia = date('Y-m-d' ,strtotime($vigencia)) ;
        
        $id = DB::table('contratos')->insertGetId
        (
            [
                'tipo'=>$tipo,
                'user_id'=>$user,    
                'cliente_id'=>$cliente,
                'vigencia'=>$vigencia,
                'taxaadmin'=>$taxaadmin,
                'taxamulta'=>$taxamulta,
                'vencimento'=>$vencimento
            ]
        );
          
        $contrato = DB::select('select  * from contratos where id = ?',[$id]);
        
        return view('contrato.contrato_edita')->with('contrato',$contrato);
        }




public function atualiza(){
        
        $id = Request::input('id');
        $tipo = Request::input('tipo');
        $user = Request::input('user_id');
        $cliente = Request::input('cliente_id');
        $vigencia = Request::input('vigencia');
        $taxaadmin = Request::input('taxaadmin');
        $taxamulta = Request::input('taxamulta');
        $vencimento = Request::input('vencimento');
        $vigencia = date('Y-m-d' ,strtotime($vigencia)) ;
        
        \r2b\Contrato::where('id',$id)
            ->update(
            [
                'tipo'=>$tipo,
                'user_id'=>$user,    
                'cliente_id'=>$cliente,
                'vigencia'=>$vigencia,
                'taxaadmin'=>$taxaadmin,
                'taxamulta'=>$taxamulta,
                'vencimento'=>$vencimento
            ]
            );
          
        $contrato = DB::select('select  * from contratos where id = ?',[$id]);
        
        return view('contrato.contrato_edita')->with('contrato',$contrato);
        }
    
    
    public function apaga($id){        
        $cliente = new \r2b\Cliente;
        $cliente->find($id)->delete();
        return view('/cliente/cliente_confirma');
    }
    public function veiculo($id)
    {
        
        $status = \r2b\Status::whereNome('Disponivel')->get();
        foreach($status as $p)
        //return $p->id;
        {
        $veiculos = \r2b\Movimentacao::whereStatus_idAndAtivo( $p->id, 1)->get();
         //return $veiculos;
        }
        return view('contrato.contrato_veiculo')->with(array('veiculos'=>$veiculos,'id'=>$id));
    }
    public function salvacarro()
    {
        $modulo = 'contrato';
        $ativo = 1;
        // arrumar o status, busca no banco pelo nome e retorna o id
        
        $status = \r2b\Status::whereNome('locado')->get();
        //return $status;
        foreach($status as $p)
        {
            $statusid = $p->id;
        }
        //return $statusid;
        $contratoid = Request::input('contratoid') ;
        $placa = Request::input('placa');
        $periodo = Request::input('periodo');
        $valor = Request::input('valor');
        $data = Request::input('data');
        $hora = Request::input('hora');
        $km = Request::input('km');
        $combustivel = Request::input('combustivel');
        $novadata = date('Y-m-d H:i' ,strtotime($data . $hora)) ;
        
        //return $valor;
        
        
        
        \r2b\Movimentacao::where('placa',$placa)
            ->where('ativo',1)
            ->update(
            [
                'data_fim'=>$novadata,
                'ativo'=> 0,
                'kmfim'=>$km,
                'combustivelfim'=>$combustivel
            ]
            );
        $movid = DB::table('movimentacoes')->insertGetId
        (
            [
                'placa'=>$placa,
                'km'=>$km,    
                'data_inicio'=>$novadata,
                'combustivel'=>$combustivel,
                'status_id'=>$statusid,
                'modulo'=>$modulo,
                'ativo'=>$ativo
            ]
        );
        DB::insert('insert into contrato_movimenta
                (contrato_id,movimentacao_id,periodo,valor)
                values(?,?,?,?)',
                array($contratoid,$movid,$periodo,$valor)
                );
        $con_mov = DB::table('contrato_movimenta')
                ->where('contrato_id','=',$contratoid)
                ->get(); 
        
        
        //return 'tudo certo até aqui';
        $contrato = \r2b\Contrato::whereId($contratoid)->get();
        $veiculos = \r2b\Contrato_Movimenta::whereContrato_id($contratoid)->get();
        
        $id = $contratoid;
        
        return redirect()->action('ContratoController@edita', ['id'=>$id]);
        
        //return redirect('/contrato_edita/{$id}');
        //        ->with(array
        //(
        //    'contrato'=>$contrato,
        //    'veiculos'=>$veiculos
        //));
        //return view('\contrato.contrato_edita')->with(array('contrato'=>$contrato,'veiculos'=>$veiculos));
        
        
        
    }
    public function retiracarro()
    {
        $contrato = Request::input('contrato');
        $movimentacao = Request::input('movimentacao');
        
        
        //$apagar = \r2b\Contrato_Movimenta::whereContrato_idAndMovimentacao_id($contrato, $movimentacao)->get();
        
        //return  $apagar;
        DB::table('contrato_movimenta')
                ->where('contrato_id', '=', $contrato)
                ->where('movimentacao_id', '=', $movimentacao)  
                ->delete();
        
        $movapag = new \r2b\Movimentacao;
        $movapag->find($movimentacao)->delete();
        return view('/cliente/cliente_confirma');
    }

}
