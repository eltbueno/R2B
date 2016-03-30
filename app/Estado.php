<?php

namespace r2b;

use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    protected $table='estados';
    protected $fillable=['nome','uf'];
    
    public function cidade(){
        
        return $this->hasMany('r2b\Cidade');
    }
}
