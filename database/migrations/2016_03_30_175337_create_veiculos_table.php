<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVeiculosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('veiculos', function (Blueprint $table) 
            {
                $table->string('placa',7);
                $table->string('chassi',17);
                $table->string('renavan');
                $table->string('anofab');
                $table->string('anomod');
                $table->unsignedInteger('modelo_id');
                $table->unsignedInteger('montadora_id');
                $table->string('grupo',1);
                $table->timestamps();
            }
        );
        Schema::table('veiculos', function($table)
            {
                $table->primary(['placa','chassi']);
            }                
        );
        
        
        Schema::table('veiculos', function($table)
            {
                $table->foreign('modelo_id')->references('id')->on('modelos');
            }                
        );
        
        Schema::table('veiculos', function ($table)
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
        Schema::drop('veiculos');
    }
}
