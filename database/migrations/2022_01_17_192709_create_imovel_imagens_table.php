<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImovelImagensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('imovel_imagens', function (Blueprint $table) {
            $table->integer('imovel_id')->index('fk_imovel_has_imagem_imovel1_idx');
            $table->integer('img_id')->index('fk_imovel_has_imagem_imagem1_idx');

            $table->primary(['imovel_id', 'img_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('imovel_imagens');
    }
}
