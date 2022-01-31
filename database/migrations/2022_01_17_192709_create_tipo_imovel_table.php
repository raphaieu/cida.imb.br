<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTipoImovelTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tipo_imovel', function (Blueprint $table) {
            $table->integer('tipo_id', true);
            $table->enum('tipo_res_com', ['RESIDENCIAL', 'COMERCIAL'])->nullable();
            $table->string('tipo_descricao');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tipo_imovel');
    }
}
