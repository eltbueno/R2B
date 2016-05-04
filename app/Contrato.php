<?php

namespace r2b;

use Illuminate\Database\Eloquent\Model;

class Contrato extends Model
{
    protected $table='contratos';
    protected $fillable=['id','tipo','vigencia','taxaadmin','taxamulta','vencimento'];
    
    
    
    public function cliente(){
        return $this->belongsTo('r2b\Cliente');
    }
    
    public function user()
    {
        return $this->hasOne('r2b\User');
    }
}
