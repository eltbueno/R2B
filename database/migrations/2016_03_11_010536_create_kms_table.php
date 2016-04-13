<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKmsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kms', function (Blueprint $table) {
            $table->increments('id');
            $table->string('placa');
            $table->integer('valor_km');
            $table->timestamps();
        });
        Schema::table('kms', function($table)
            {                
                $table->foreign('placa')->references('placa')->on('veiculos');
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
        Schema::drop('kms');
    }
}
