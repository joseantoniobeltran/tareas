<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tareas', function (Blueprint $table) {
            $table->id(); // Crea un campo id auto incremental
            $table->string('tarea_titulo'); // Crea un campo para título de la tarea
            $table->string('tarea_descripcion'); // Crea un campo para descripción de la tarea
            $table->string('tarea_estado'); // Crea un campo para estado de la tarea
            $table->timestamps(); // Crea campos created_at y updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tareas');
    }
};
