<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImovelTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('imovel', function (Blueprint $table) {
            $table->integer('imovel_id', true);
            $table->integer('corretor_id')->index('fk_imovel_corretor1_idx');
            $table->integer('tipo_imovel_id')->index('fk_imovel_tipo_imovel1_idx');
            $table->integer('tipo_negocio_id')->index('fk_imovel_tipo_negocio1_idx');
            $table->string('imovel_titulo')->nullable();
            $table->mediumText('imovel_descricao')->nullable();
            $table->string('imovel_area', 20)->nullable();
            $table->char('imovel_quarto', 5)->nullable();
            $table->char('imovel_banheiro', 5)->nullable();
            $table->char('imovel_suite', 5)->nullable();
            $table->char('imovel_vagas', 5)->nullable();
            $table->double('imovel_preco')->nullable();
            $table->double('imovel_valor_cond')->nullable();
            $table->double('imovel_valor_iptu')->nullable();
            $table->integer('imovel_visualizacao')->nullable()->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('imovel');
    }
}
