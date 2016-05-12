<?php

namespace r2b;

use Illuminate\Database\Eloquent\Model;

class Contrato_Movimenta extends Model
{
    protected $table='contrato_movimenta';
    protected $fillable=['contrato_id,periodo','valor'];
    
    public function movimentacao(){
        return $this->belongsTo('r2b\Movimentacao');        
    }
    
    public function contrato(){
        return $this->belongsTo('r2b\Contrato');
    }
}
