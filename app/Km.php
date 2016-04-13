<?php

namespace r2b;

use Illuminate\Database\Eloquent\Model;

class Km extends Model
{
    protected $table = 'kms';
    protected $fillable = ['valor_km'];
    
    public function veiculo(){
        return $this->hasOne('r2b\Veiculo');
    }
}
