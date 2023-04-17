<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBoletosAditionesTable extends Migration
{
    public function up()
    {
        Schema::create('boletos_aditiones', function (Blueprint $table) {
            $table->id();
            $table->integer('number');
            $table->dateTime('sorteo');
            $table->string('status');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('boletos_aditiones');
    }
}
