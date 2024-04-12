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
        Schema::create('imagem', function (Blueprint $table) {
            $table->integer('img_id', true);
            $table->integer('img_imovel_id')->index('fk_imagem_imovel1_idx');
            $table->string('img_nome');
            $table->string('img_titulo', 100)->nullable();
            $table->char('img_ordem', 2)->nullable();
            $table->char('img_destaque', 1)->default('0');

            $table->primary(['img_id', 'img_imovel_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('imagem');
    }
};
