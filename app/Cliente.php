<?php

namespace r2b;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table='clientes';
    protected $fillable=['id','nome','end','end_num','end_com','bairro','cep','telefone','obs','tipo'];
    
        
    public function cidade(){
        return $this->hasOne('r2b\Cidade');
    }
    
    public function contrato(){
        return $this->hasMany('r2b\Contrato');
    }
    
}
