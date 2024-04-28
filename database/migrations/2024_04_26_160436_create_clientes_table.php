<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->id();
             $table->string('nombre');
             $table->string('apellido');
             $table->string('cedula');
             $table->string('email');
            $table->boolean('HabeasData');
             $table->string('celular');
            $table->boolean('ganador')->default(false);
          $table->foreignId('country_id')->constrained('countries');
          $table->foreignId('department_id')->nullable()->constrained('departments');
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
        Schema::dropIfExists('clientes');
    }
};
