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
        Schema::create('boletos_aleatorios', function (Blueprint $table) {
            $table->id();
            $table->string('number');
            $table->unsignedBigInteger('id_us');
            $table->foreign('id_us')->references('id')->on('users');
            $table->string('sorteo');
            $table->string('status')->default('activo');
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
        Schema::dropIfExists('boletos_aleatorios');
    }
};
