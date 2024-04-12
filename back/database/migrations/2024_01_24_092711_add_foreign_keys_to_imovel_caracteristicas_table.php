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
        Schema::table('imovel_caracteristicas', function (Blueprint $table) {
            $table->foreign(['c_id'], 'fk_imovel_has_caracteristica_caracteristica1')->references(['c_id'])->on('caracteristica');
            $table->foreign(['imovel_id'], 'fk_imovel_has_caracteristica_imovel')->references(['imovel_id'])->on('imovel')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('imovel_caracteristicas', function (Blueprint $table) {
            $table->dropForeign('fk_imovel_has_caracteristica_caracteristica1');
            $table->dropForeign('fk_imovel_has_caracteristica_imovel');
        });
    }
};
