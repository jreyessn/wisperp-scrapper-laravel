<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class WsrScrappers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wsr_scrappers', function (Blueprint $table) {
            $table->id();
            $table->string('api_url')->comment("API del scrapper");
            $table->string('description')->nullable()->comment("Descripción");
            $table->string('shared_key')->nullable()->comment("Llave compartida para autenticación");
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('wsr_scrappers');
    }
};
