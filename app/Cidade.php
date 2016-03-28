<?php

namespace r2b;

use Illuminate\Database\Eloquent\Model;

class Cidade extends Model
{
    
    public function estado(){
        
        return $this->belongsTo(Estado::class);
    }
}
