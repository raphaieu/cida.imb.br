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
        Schema::create('imovel_caracteristicas', function (Blueprint $table) {
            $table->integer('imovel_id')->index('fk_imovel_has_caracteristica_imovel_idx');
            $table->integer('c_id')->index('fk_imovel_has_caracteristica_caracteristica1_idx');
            $table->string('valor')->nullable();

            $table->primary(['imovel_id', 'c_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('imovel_caracteristicas');
    }
};
