<?php

namespace r2b;

use Illuminate\Database\Eloquent\Model;

class Movimentacao extends Model
{
   protected $table = 'movimentacoes';
    protected $fillable = ['km','data','hora','combustivel','modulo'];
    
    public function veiculo(){
        return $this->hasOne('r2b\Veiculo');
    }
    public function status(){
        return $this->hasOne('r2b\Status');
    }
}
