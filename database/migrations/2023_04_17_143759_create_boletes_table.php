<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBoletesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('boletes', function (Blueprint $table) {
            $table->id();
            $table->integer('number');
            $table->foreignId('id_us')->constrained('users');
            $table->string('sorteo');
            $table->string('status');
            $table->string('cod_ref');
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
        Schema::dropIfExists('boletes');
    }
}
