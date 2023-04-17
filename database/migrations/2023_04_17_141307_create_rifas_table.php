<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRifasTable extends Migration
{
    public function up()
    {
        Schema::create('rifas', function (Blueprint $table) {
            $table->id();
            $table->string('premio');
            $table->dateTime('del');
            $table->dateTime('hasta');
            $table->string('bole_adi');
            $table->dateTime('fecha_sorteo');
            $table->string('img')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('rifas');
    }
}
