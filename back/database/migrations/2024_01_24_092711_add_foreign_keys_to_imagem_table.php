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
        Schema::table('imagem', function (Blueprint $table) {
            $table->foreign(['img_imovel_id'], 'fk_imagem_imovel1')->references(['imovel_id'])->on('imovel')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('imagem', function (Blueprint $table) {
            $table->dropForeign('fk_imagem_imovel1');
        });
    }
};
