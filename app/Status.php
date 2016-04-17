<?php

namespace r2b;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    protected $table ='status';
    protected $fillable = ['nome'];
    
    public function movimentacao(){
        return $this->hasMany('r2b\Movimentacao');
    }
}
