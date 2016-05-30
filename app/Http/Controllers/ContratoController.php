<?php namespace r2b\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Request;
class ContratoController extends Controller{
    public function __construct() {
        $this->middleware('auth');
        
    }
    public function contrato()
    {
        return view('contrato.contrato')->with('message',0);
    }
    public function novo()
    {
        
        $usuarios = \r2b\User::All();
        
        return view('contrato.contrato_novo')
                ->with(array(       
                    
                    
                    'usuarios'=>$usuarios
                
                ));
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
        elseif ($id != "" && $cli_id == "" && $cli_nome == "" ) 
        {
            $contratos = \r2b\Contrato::whereId($id)->get();
            //$contratos = DB::select('select  * from contratos where id = ?',[$id]); 
        }
        elseif ($id == "" && $cli_id != "" && $cli_nome == "" ) 
        {
            $contratos = \r2b\Contrato::whereCliente_id($cli_id)->get();
        }
        elseif ($id == "" && $cli_id == "" && $cli_nome != "" ) 
        {
            //$contratos = \r2b\Contrato::where('cliente->nome','like','%'.$cli_nome.'%') ->get(); 
            
            
            $contratos = \r2b\Contrato::with(['cliente' => function ($query) {                
                global $cli_nome;
                $query->where('cli_nome', 'like', '%'.$cli_nome .'%');
            }])->get();           
            
        }
        
        
        
            
        return view('contrato.contrato')->with('contratos',$contratos);
        
        
    }
    
    public function edita()
        {
        $id = Request::input('id'); 
        $contrato = \r2b\Contrato::whereId($id)->get();
        $veiculos = \r2b\Contrato_Movimenta::whereContrato_id($id)->get();
        $message = Request::input('message');
        $usuarios = \r2b\User::All();
        return view('contrato.contrato_edita')
                ->with(array(
                    'contrato'=>$contrato,
                    'veiculos'=>$veiculos,
                    'message'=>$message,
                    'usuarios'=>$usuarios
                ));
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
          
        $contrato = \r2b\Contrato::whereId($id)->get();
        $veiculos = \r2b\Contrato_Movimenta::whereContrato_id($id)->get();
        $message = 3;
        $usuarios = \r2b\User::All();
        return view('contrato.contrato_edita')
                ->with(array(
                    'contrato'=>$contrato,
                    'veiculos'=>$veiculos,
                    'message'=>$message,
                    'usuarios'=>$usuarios
                ));
        
        
        
        
        //return view('contrato.contrato_edita')->with('contrato',$contrato);
        //return view('contrato.contrato_edita')->with(array('contrato'=>$contrato,'veiculos'=>$veiculos));
    }




public function atualiza(){
        
        $id = Request::input('id');
        $tipo = Request::input('tipo');
        $user = Request::input('user_id');
        $cliente = Request::input('cliente_id');
        $vigencia = Request::input('vigencia');
        //return $id;
        $taxaadmin = Request::input('taxaadmin');
        $taxamulta = Request::input('taxamulta');
        $vencimento = Request::input('vencimento');
        $vigencia = date('Y-m-d' ,strtotime($vigencia)) ;
        
        //return $vigencia;
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
          
        $contrato = \r2b\Contrato::whereId($id)->get();
        $veiculos = \r2b\Contrato_Movimenta::whereContrato_id($id)->get();
        $message = 2;
        $usuarios = \r2b\User::All();
        
        return view('contrato.contrato_edita')
                ->with(array(
                    'contrato'=>$contrato,
                    'message'=>$message,
                    'veiculos'=>$veiculos,
                    'usuarios'=>$usuarios
                
                ));     
        }
    
    
    public function apaga($id){        
        $cliente = new \r2b\Cliente;
        $cliente->find($id)->delete();
        return view('/cliente/cliente_confirma');
    }
    public function veiculo()
    {
        //return "chegou aqui";
        $id = Request::input('id');
        $status = \r2b\Status::whereNome('Disponivel')->get();
        foreach($status as $p)
        //return $p->id;
        {
        $veiculos = \r2b\Movimentacao::whereStatus_idAndAtivo( $p->id, 1)->get();
         //return $veiculos;
        }
        return view('contrato.contrato_veiculo')->with(array('veiculos'=>$veiculos,'id'=>$id));
    }
   
    
    
    public function salvacarro(Request $request)
    {
        $erro = 0;
        $regras = [       ];
        $contratoid = Request::input('contratoid') ;
        $placa = Request::input('placa');
        $periodo = Request::input('periodo');
        $valor = Request::input('valor');
        $data = Request::input('data');
        $hora = Request::input('hora');
        $km = Request::input('km');
        $combustivel = Request::input('combustivel');
        $novadata = date('Y-m-d H:i' ,strtotime($data . $hora)) ;   
        //$novadata = date('Y-m-d H:i' ,strtotime("01/05/2015 08:00")) ;   
        
        //return date(strtotime($novadata));
        $movativa = \r2b\Movimentacao::wherePlacaAndAtivo($placa, 1)->get();
        foreach ($movativa as $p)
        {
            $dataativa = $p->data_inicio;
            $kmativo = $p->km;
            
        }
        if (strtotime($dataativa)> strtotime($novadata))
        {
            $message1 = "Nova data não pode ser menor que a data atual: ". $dataativa;
            $message2 = "sem validar o km";
            $erro = 1;
        }
    
        if ($kmativo > $km)
        {
            $message2 = "Novo KM não pode ser menor que o antigo: ". $kmativo;
            $erro = 1;
        }
        //return $erro;
        if($erro == 1)
        {
            //return redirect('/contrato_veiculo/$contratoid}')
            //->with("message1",$message1);
            return view('contrato.contrato_veiculo')
                    ->with(array(
                        'placa'=>$placa,
                        'id'=>$contratoid,
                        'message1'=>$message1,
                        'message2'=>$message2
                    
                    ));
            
        }
        
        
        //return "ate aqui ok";
        
        
        $modulo = 'contrato';
        $ativo = 1;
       
        
        $status = \r2b\Status::whereNome('locado')->get();
        //return $status;
        foreach($status as $p)
        {
            $statusid = $p->id;
        }
        //return $statusid;
        
        
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
              
        
        $id = $contratoid;
        
        return redirect()->action('ContratoController@edita', ['id'=>$id]);
        
    
        
        
        
    }
    public function retiracarro()
    {
        $contratoid = Request::input('contrato');
        $movimentacao = Request::input('movimentacao');
        
        //return $contrato;       
        $mov = \r2b\Movimentacao::whereId($movimentacao)->get();
        foreach ($mov as $p)
        {
         $placa = $p->placa;
        }
        
        
        DB::table('contrato_movimenta')
                ->where('contrato_id', '=', $contratoid)
                ->where('movimentacao_id', '=', $movimentacao)  
                ->delete();
        
        $movapag = new \r2b\Movimentacao;
        $movapag->find($movimentacao)->delete();
        
        //return "chegou aqui";
        $movmuda = \r2b\Movimentacao::wherePlaca($placa)->get();
        foreach ($movmuda as $movmuda)
        {
            $id = $movmuda->id;
        }
        
        //return $id;
        DB::table('movimentacoes')
                ->where('id',$id)
                
                ->update([
                    'data_fim'=>"",
                    'ativo'=>1,
                    'kmfim'=>"",
                    'combustivelfim'=>""
                    ]);
        
        $contrato = \r2b\Contrato::whereId($contratoid)->get();
        $veiculos = \r2b\Contrato_Movimenta::whereContrato_id($contratoid)->get();
        $message = 4;
        $usuarios = \r2b\User::All();
        
        return view('contrato.contrato_edita')
                ->with(array(
                    'contrato'=>$contrato,
                    'message'=>$message,
                    'veiculos'=>$veiculos,
                    'usuarios'=>$usuarios
                
                ));     
        
    }
    public function sai() {
        
        $movid = Request::input('movimentacao');
        $contid = Request::input('contrato');
        
        $movatual = \r2b\Movimentacao::whereId($movid)->get();
        
        //return $movatual;
        return view('contrato.contrato_sai')
                ->with(array(
                    'movatual'=>$movatual,
                    'contid'=>$contid
                ));
        
    }
    
    public function carrosai() 
    {
        //return "chegou no controller";
        $status = \r2b\Status::whereNome('Retorno de Locação')->get();
        foreach($status as $p)
        {
            $statusid = $p->id;
        }
        //return $statusid;
        
        $modulo = 'contrato';
        $ativo = 1;
        $placa = Request::input('placa');
        $data = Request::input('data');
        $hora = Request::input('hora');
        $km = Request::input('km');
        $combustivel = Request::input('combustivel');
        $contid = Request::input('contid');
        
        //$retorno = ;
        
        //$status = $retorno;
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
                array($placa,$km,$novadata,$combustivel,$statusid,$modulo,$ativo)
                );
        
        
        
        $contrato = \r2b\Contrato::whereId($contid)->get();
        $veiculos = \r2b\Contrato_Movimenta::whereContrato_id($contid)->get();
        $message = 5;
        $usuarios = \r2b\User::All();
        
        return view('contrato.contrato_edita')
                ->with(array(
                    'contrato'=>$contrato,
                    'message'=>$message,
                    'veiculos'=>$veiculos,
                    'usuarios'=>$usuarios
                
                ));
        
    }

}
