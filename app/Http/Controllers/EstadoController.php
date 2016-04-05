<?php namespace r2b\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Request;
class EstadoController extends Controller{
    public function adiciona(){
        $nome = Request::input('nome');
        DB::insert('insert into estados(nome)values(?)', array($nome));
        return view('/configuracao/estado/estado_confirma');        
        
    }
    public function busca(){
        $nome = Request::input('nome');
        $id = Request::input('id');
        if ($id == "" && $nome == "")
        {  
            $estados = DB::select('select  * from estados ');             
        }
        elseif($id != "" && $nome !="")
        {
            $estados = DB::table('estados')
                ->where('id','=',$id)
                ->where('nome','like','%'.$nome.'%')
                ->get();
        }
        elseif($id != "" && $nome =="")
        {
            $estados = DB::select('select * from estados where id = ?',[$id]);
        }        
        else
        {
            $estados = DB::table('estados')                
                ->where('nome','like','%'.$nome.'%')
                ->get();
        }
        return view('/configuracao/estado/estado_mostra')->with('estados',$estados);
    }
    public function edita()
    {
        $id = Request::input('id');
        $estados = DB::select('select  * from estados where id = ?',[$id]);
        return view('configuracao/estado/estado_edita2')->with('estados',$estados);
    }
    public function atualiza()
    {
        $id = Request::input('id');
        $nome = Request::input('nome');
        
        DB::table('estados')
                ->where('id', $id)
                ->update(['nome'=>$nome]);
        return view('/configuracao/estado/estado_confirma'); 
    }
}