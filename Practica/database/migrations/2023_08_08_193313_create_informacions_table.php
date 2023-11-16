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
        Schema::create('informacions', function (Blueprint $table) {
            $table->id();
            $table->string('Ciudad');
            $table->string('Telefono');

            $table->unsignedBigInteger('Estudiante_id');

            $table->foreign('Estudiante_id')
            ->references('id')
            ->on('estudiantes')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('informacions');
    }
};
