<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCidadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
Schema::create('cidades', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome',30);
            $table->unsignedInteger('estado');
            $table->timestamps();
        });
        
        Schema::table('cidades', function($table)
            {
                
                $table->foreign('estado')->references('id')->on('estados');
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
        Schema::drop('cidades');
    }
}
