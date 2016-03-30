<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateModelosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('modelos', function (Blueprint $table) 
            {
                $table->increments('id');
                $table->string('nome',25);
                $table->unsignedinteger('montadora_id');
                $table->timestamps();
            }
        );
        
        Schema::table('modelos', function($table)
            {
                $table->foreign('montadora_id')->references('id')->on('montadoras');
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
        Schema::drop('modelos');
    }
}
