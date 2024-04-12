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
        Schema::table('imovel', function (Blueprint $table) {
            $table->foreign(['corretor_id'], 'fk_imovel_corretor1')->references(['corretor_id'])->on('corretor')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['tipo_imovel_id'], 'fk_imovel_tipo_imovel1')->references(['tipo_id'])->on('tipo_imovel')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['tipo_negocio_id'], 'fk_imovel_tipo_negocio1')->references(['negocio_id'])->on('tipo_negocio')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('imovel', function (Blueprint $table) {
            $table->dropForeign('fk_imovel_corretor1');
            $table->dropForeign('fk_imovel_tipo_imovel1');
            $table->dropForeign('fk_imovel_tipo_negocio1');
        });
    }
};
