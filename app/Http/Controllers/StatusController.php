<?php namespace r2b\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Request;
class StatusController extends Controller{
    public function adiciona(){
        $nome = Request::input('nome');
        
        DB::insert('insert into cidades(nome,estado_id)values(?,?)', array($nome, $estado));
        return view('/configuracao/cidade/cidade_confirma');        
        
    }
    public function busca(){
        $id = Request::input('id');
        $nome = Request::input('nome');
                
        if ($id == "" && $nome == "")
        {  
            $status = DB::select('select  * from status ');             
        }
        elseif($id != "" && $nome =="")
        {
           $status = DB::select('select * from status where id = ?',[$id]);
        }        
        elseif($id == "" && $nome !="") 
        {
            $status = DB::table('status')                
                ->where('nome','like','%'.$nome.'%')
                ->get();
        }  else 
        {
            $status = DB::table('status')
                ->where('id','=',$id)
                ->where('nome','like','%'.$nome.'%')
                ->get();
        }       
        return view('/configuracao/status/status_mostra')->withstatus($status);
    }
    public function edita($id) //colocando a variavel aqui já recupera o valor diretamente
    {
        //$id = Request::route('id');
        //recuperando o parametro da url
        $cidades = DB::select('select  * from cidades where id = ?',[$id]);
        return view('configuracao/cidade/cidade_edita2')->with('cidades',$cidades);
    }
    public function atualiza()
    {
        $id = Request::input('id');
        $nome = Request::input('nome');
        $estado = Request::input('estado_id');
        
        DB::table('cidades')
                ->where('id', $id)
                ->update(['nome'=>$nome,'estado_id'=>$estado]);
        return view('/cliente/cliente_confirma'); 
    }
}