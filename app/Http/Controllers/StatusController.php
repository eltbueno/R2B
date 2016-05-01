<?php namespace r2b\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Request;
class StatusController extends Controller{
    public function __construct() {
        $this->middleware('auth');
        
    }
    public function adiciona(){
        $nome = Request::input('nome');
        
        DB::insert('insert into status(nome)values(?)', array($nome));
        return view('/configuracao/status/status_confirma');        
        
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
    public function edita() //colocando a variavel aqui já recupera o valor diretamente
    {
        $id = Request::input('id');
        //recuperando o parametro da url
        $status = DB::select('select  * from status where id = ?',[$id]);
        return view('configuracao/status/status_edita')->with('status',$status);
    }
    public function atualiza()
    {
        $id = Request::input('id');
        $nome = Request::input('nome');
       
        
        DB::table('status')
                ->where('id', $id)
                ->update(['nome'=>$nome]);
        return view('configuracao/status/status_confirma'); 
    }
    public function apaga($id){        
       DB::table('status')->where('id','=',$id)->delete();
        
        //$veiculo = new \r2b\Veiculo;
        //$veiculo->find($placa)->delete();
        return view('configuracao/status/status_confirma');
    }
}