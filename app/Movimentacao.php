<?php

namespace r2b;

use Illuminate\Database\Eloquent\Model;

class Movimentacao extends Model
{
   protected $table = 'movimentacoes';
    protected $fillable = ['km','data_inicio','data_fim','combustivel','modulo'];
    
    public function veiculo(){
        return $this->hasOne('r2b\Veiculo');
    }
    public function status(){
        return $this->belongsTo('r2b\Status');
    }
    public function contmov(){
        return $this->belongsTo('r2b\Contrato_Movimenta');
    }
}
