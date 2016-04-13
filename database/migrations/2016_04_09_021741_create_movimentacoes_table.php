<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMovimentacoesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movimentacoes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('placa');
            $table->integer('km');
            $table->date('data');
            $table->datetime('hora');
            $table->integer('combustivel');
            $table->unsignedInteger('status_id');
            $table->string('modulo');
            $table->timestamps();
        });
        Schema::table('movimentacoes', function($table)
            {
                
                $table->foreign('placa')->references('placa')->on('veiculos');
            }               
        );
        Schema::table('movimentacoes', function($table)
            {
                
                $table->foreign('status_id')->references('id')->on('status');
            }               
        );
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('movimentacaos');
    }
}
