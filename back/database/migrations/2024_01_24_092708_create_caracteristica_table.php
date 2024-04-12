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
        Schema::create('caracteristica', function (Blueprint $table) {
            $table->comment('Características tanto do imóvel quanto do Edifício');
            $table->integer('c_id', true);
            $table->string('c_nome');
            $table->string('c_icone', 45)->nullable();
            $table->enum('c_tipo', ['IMOVEL', 'CONDOMINIO', 'EDF', 'TERRENO'])->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('caracteristica');
    }
};
