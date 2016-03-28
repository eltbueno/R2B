<?php

namespace r2b;

use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    protected $table='estados';
    protected $fillable=['nome'];
    
    public function cidade(){
        
        return $this->belongsTo(Cidade::class);
    }
}
