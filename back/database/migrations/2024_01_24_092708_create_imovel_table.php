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
        Schema::create('imovel', function (Blueprint $table) {
            $table->integer('imovel_id', true);
            $table->integer('corretor_id')->nullable()->index('fk_imovel_corretor1_idx');
            $table->integer('tipo_imovel_id')->nullable()->index('fk_imovel_tipo_imovel1_idx');
            $table->integer('tipo_negocio_id')->nullable()->index('fk_imovel_tipo_negocio1_idx');
            $table->string('imovel_titulo')->nullable();
            $table->mediumText('imovel_descricao')->nullable();
            $table->string('imovel_area', 20)->nullable();
            $table->string('imovel_quarto', 20)->nullable();
            $table->string('imovel_banheiro', 20)->nullable();
            $table->string('imovel_suite', 20)->nullable();
            $table->string('imovel_vagas', 20)->nullable();
            $table->double('imovel_preco')->nullable();
            $table->double('imovel_valor_cond')->nullable();
            $table->double('imovel_valor_iptu')->nullable();
            $table->integer('imovel_visualizacao')->nullable()->default(0);
            $table->char('imovel_destaque', 1)->default('0');
            $table->string('imovel_slug')->default('-')->unique('imovel_slug_UNIQUE');
            $table->dateTime('imovel_data_cadastro')->nullable()->useCurrent();
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
};
