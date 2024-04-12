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
        Schema::create('corretor', function (Blueprint $table) {
            $table->integer('corretor_id', true);
            $table->string('corretor_creci', 15)->nullable();
            $table->string('corretor_bio')->nullable();
            $table->string('corretor_contato')->nullable();
            $table->unsignedBigInteger('users_id')->nullable()->index('fk_corretor_users1_idx');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('corretor');
    }
};
