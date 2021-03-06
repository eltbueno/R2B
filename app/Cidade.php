<?php

namespace r2b;

use Illuminate\Database\Eloquent\Model;

class Cidade extends Model
{
    protected $table = 'cidades';
    protected $fillable = ['nome'];
    
    public function estado(){
        return $this->belongsTo('r2b\Estado');
    }
}
