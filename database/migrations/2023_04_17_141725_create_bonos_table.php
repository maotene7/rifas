<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBonosTable extends Migration
{
    public function up()
    {
        Schema::create('bonos', function (Blueprint $table) {
            $table->id();
            $table->string('img')->nullable();
            $table->dateTime('sorteo');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('bonos');
    }
}
