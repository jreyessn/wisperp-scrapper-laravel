<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class WsrRoutersInterfaces extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wsr_routers_interfaces', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->comment("Alias para identificar la interfaz del router");
            $table->string('description')->nullable()->comment("Descripción");
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
        Schema::dropIfExists('wsr_routers_interfaces');
    }
};
