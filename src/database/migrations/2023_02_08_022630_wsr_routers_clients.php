<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class WsrRoutersClients extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wsr_routers_clients', function (Blueprint $table) {
            $table->id();
            $table->string('ip', 50);
            $table->string('port', 6)->nullable();
            $table->string('user')->nullable()->comment("Credencial de usuario");
            $table->string('password')->nullable()->comment("Credencial de contraseña");
            $table->foreignId('wsr_scrapper_id')->constrained()->comment("Qué scrapper utiliza el cliente");
            $table->foreignId("wsr_routers_interface_id")->constrained()->comment("Qué interfaz debe utilizar el scrapper");
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
        Schema::dropIfExists('wsr_routers_clients');
    }
};
