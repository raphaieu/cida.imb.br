<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToImovelImagensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('imovel_imagens', function (Blueprint $table) {
            $table->foreign(['img_id'], 'fk_imovel_has_imagem_imagem1')->references(['img_id'])->on('imagem')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['imovel_id'], 'fk_imovel_has_imagem_imovel1')->references(['imovel_id'])->on('imovel')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('imovel_imagens', function (Blueprint $table) {
            $table->dropForeign('fk_imovel_has_imagem_imagem1');
            $table->dropForeign('fk_imovel_has_imagem_imovel1');
        });
    }
}
