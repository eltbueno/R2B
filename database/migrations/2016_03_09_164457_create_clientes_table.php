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
            $table->increments('cli_id');
            $table->string('cli_nome');
            $table->string('cli_end');
            $table->integer('cli_end_num');
            $table->string('cli_end_com');
            $table->string('cli_bairro');
            $table->string('cli_cidade');
            $table->string('cli_estado');
            $table->integer('cli_cep');
            $table->integer('cli_tel');
            $table->string('cli_obs');
            $table->integer('cli_tipo');
            $table->timestamps();
        });
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
