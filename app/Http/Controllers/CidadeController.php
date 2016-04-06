<?php namespace r2b\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Request;
class CidadeController extends Controller{
    public function adiciona(){
        $nome = Request::input('nome');
        $estado = Request::input('estado');
        DB::insert('insert into cidades(nome,estado_id)values(?,?)', array($nome, $estado));
        return view('/configuracao/cidade/cidade_confirma');        
        
    }
    public function busca(){
        $id = Request::input('id');
        $nome = Request::input('nome');
        $estado = Request::input('estado_id');
        
        if ($id != "")
        {
            $cidades = DB::select('select * from cidades where id = ?',[$id]);
            
        }elseif ($estado == "" && $nome == "")
        {  
            $cidades = DB::select('select  * from cidades ');             
        }
        elseif($estado != "" && $nome !="")
        {
            $cidades = DB::table('cidade')
                ->where('estado_id','=',$estado)
                ->where('nome','like','%'.$nome.'%')
                ->get();
        }
        elseif($estado != "" && $nome =="")
        {
            $cidades = DB::select('select * from cidades where estado_id = ?',[$estado]);
        }        
        else
        {
            $cidades = DB::table('cidades')                
                ->where('nome','like','%'.$nome.'%')
                ->get();
        }
        return view('/configuracao/cidade/cidade_mostra')->with('cidades',$cidades);
    }
    public function edita()
    {
        $id = Request::input('id');
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
        return view('/configuracao/cidade/cidade_confirma'); 
    }
}