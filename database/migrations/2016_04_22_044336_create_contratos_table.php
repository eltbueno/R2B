<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContratosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contratos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('tipo');
            $table->date('vigencia');
            $table->float('taxaadmin');
            $table->string('taxamulta');
            $table->integer('vencimento');
            $table->unsignedInteger('cliente_id');
            $table->unsignedInteger('user_id');
            $table->timestamps();
        });
        Schema::table('contratos', function ($table)
            {
                $table->foreign('cliente_id')->references('id')->on('clientes');
            }   
        );
        
        Schema::table('contratos', function($table)
            {
                $table->foreign('user_id')->references('id')->on('users');
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
        Schema::drop('contratos');
    }
}
