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
        Schema::create('endereco', function (Blueprint $table) {
            $table->integer('endereco_id', true);
            $table->integer('endereco_imovel_id')->nullable()->index('fk_endereco_imovel1_idx');
            $table->string('endereco_logradouro')->nullable();
            $table->string('endereco_bairro', 150)->nullable();
            $table->string('endereco_municipio', 150);
            $table->string('endereco_uf', 5);
            $table->string('endereco_cep', 10)->nullable();
            $table->string('endereco_zona', 125);
            $table->string('endereco_regiao', 125);
            $table->mediumText('endereco_maps')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('endereco');
    }
};
