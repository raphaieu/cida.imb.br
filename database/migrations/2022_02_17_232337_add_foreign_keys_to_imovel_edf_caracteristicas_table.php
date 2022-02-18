<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToImovelEdfCaracteristicasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('imovel_edf_caracteristicas', function (Blueprint $table) {
            $table->foreign(['edf_c_id'], 'fk_imovel_has_caracteristica_caracteristica2')->references(['c_id'])->on('caracteristica')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['imovel_id'], 'fk_imovel_has_caracteristica_imovel1')->references(['imovel_id'])->on('imovel')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('imovel_edf_caracteristicas', function (Blueprint $table) {
            $table->dropForeign('fk_imovel_has_caracteristica_caracteristica2');
            $table->dropForeign('fk_imovel_has_caracteristica_imovel1');
        });
    }
}
