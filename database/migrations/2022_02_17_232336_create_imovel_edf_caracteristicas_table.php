<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImovelEdfCaracteristicasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('imovel_edf_caracteristicas', function (Blueprint $table) {
            $table->integer('imovel_id')->index('fk_imovel_has_caracteristica_imovel1_idx');
            $table->integer('edf_c_id')->index('fk_imovel_has_caracteristica_caracteristica2_idx');

            $table->primary(['imovel_id', 'edf_c_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('imovel_edf_caracteristicas');
    }
}
