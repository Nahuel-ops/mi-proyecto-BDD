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
        Schema::create('cursos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('categoria_id')
                ->constrained('categorias')
                ->cascadeOnDelete()
                ->restrictOnDelete();
                // NUEVAS RELACIONES AGREGADAS 
            $table->foreignId('instructor_id')->constrained('instructores');
            $table->foreignId('horario_id')->constrained('horarios');
            
            $table->string('nombre');
            $table->text('descripcion')->nullable();
            $table->timestamps(); //created_at y updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cursos');
    }
};
