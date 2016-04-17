<?php

namespace r2b;

use Illuminate\Database\Eloquent\Model;

class Veiculo extends Model
{
    public function movimentacoes()
    {
        return $this->hasMany('r2b\Movimentacao');
    }
}
