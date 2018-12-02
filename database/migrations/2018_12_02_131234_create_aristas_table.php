<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAristasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aristas', function (Blueprint $table) {
            $table->unsignedInteger('id_route_origen');
            $table->unsignedInteger('id_route_destino');
            $table->double('peso')->nullable();
            $table->double('distancia')->nullable();
            $table->double('hora')->nullable();
            $table->double('trafico')->nullable();
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
        Schema::dropIfExists('aristas');
    }
}
