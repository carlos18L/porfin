<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('insumos', function (Blueprint $table) {
            $table->id(); // idinsumos auto-incremental
            $table->string('obra');
            $table->integer('cantidad');
            $table->string('descripcion');
            $table->string('estado');
            $table->string('codigo');
            $table->string('concepto');
            $table->string('unidad');
            $table->date('fecha');
            $table->timestamps(); // Para created_at y updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('insumos');
    }
};
