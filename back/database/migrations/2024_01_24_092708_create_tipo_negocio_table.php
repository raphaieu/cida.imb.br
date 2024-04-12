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
        Schema::create('tipo_negocio', function (Blueprint $table) {
            $table->comment('Qual o tipo de negócio que é o imóvel (Comprar, Alugar, Lançamento)');
            $table->integer('negocio_id', true);
            $table->string('negocio_tipo', 150);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tipo_negocio');
    }
};
