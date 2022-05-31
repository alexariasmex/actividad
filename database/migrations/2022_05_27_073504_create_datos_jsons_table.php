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
        Schema::create('datos_jsons', function (Blueprint $table) {
            $table->id();
            $table->string('numeroProyecto');
            $table->string('dependenciaEjecutora',500);
            $table->string('nombreProyecto',850);
            $table->double('aprobado',10,5)->nullable()->default(0);
            $table->double('pagado',10,5)->nullable()->default(0);
            $table->timestamp('created_at')->nullable()->useCurrent();
            $table->timestamp('updated_at')->nullable()->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('datos_jsons');
    }
};
