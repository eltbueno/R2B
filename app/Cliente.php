<?php

namespace r2b;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table='clientes';
    protected $fillable=['nome','end','end_num','end_com','bairro','cep','telefone','obs','tipo'];
    
    public function estado(){
        return $this->hasOne('r2b\Estado');        
    }
    
    public function cidade(){
        return $this->hasOne('r2b\Cidade');
    }
    
}