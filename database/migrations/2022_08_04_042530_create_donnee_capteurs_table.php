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
        Schema::create('donnee_capteurs', function (Blueprint $table) {
            $table->id();
            $table->string('n');
            $table->string('p');
            $table->string('k');
            $table->string('ph');
            $table->foreignId('champ_id')->constrained()->oneDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('donnee_capteurs');
    }
};
