<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContratoMovimentacao extends Migration
{
    
    public function up()
    {
        
        Schema::create('contrato_movimenta', function(Blueprint $table)
        {
            $table->integer('contrato_id')->unsigned();
            $table->integer('movimentacao_id')->unsigned();
            $table->integer('periodo');
            $table->float('valor',2);
            
            $table->foreign('contrato_id')
                    ->references('id')
                    ->on('contratos')
                    ->ondelete('cascade');
            
            $table->foreign('movimentacao_id')
                    ->references('id')
                    ->on('movimentacoes')
                    ->ondelete('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
