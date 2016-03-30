<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome',40);
            $table->string('end',30);
            $table->string('end_num',6);
            $table->string('end_com',10);
            $table->string('bairro',20);
            $table->unsignedInteger('estado_id');            
            $table->unsignedInteger('cidade_id');
            $table->integer('cep');
            $table->integer('telefone');
            $table->string('obs',30);
            $table->integer('tipo');
            $table->timestamps();
        });        
        Schema::table('clientes', function($table)
            {                
                $table->foreign('estado_id')->references('id')->on('estados');
            }               
        );        
        Schema::table('clientes', function($table)
            {                
                $table->foreign('cidade_id')->references('id')->on('cidades');
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
        Schema::drop('clientes');
    }
}
