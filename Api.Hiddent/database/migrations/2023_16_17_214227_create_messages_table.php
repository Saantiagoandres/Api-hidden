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
        Schema::create('messages', function (Blueprint $table) {
            $table->id();
            $table->string('Contenido_mensaje');
            $table->dateTime('Fecha_hora_mensaje');
            // $table->string('slug')->unique();
            $table->timestamps();

            // foraneas

            $table->unsignedBigInteger('candidate_id');
            $table->foreign('candidate_id')
            ->references('id')
            ->on('candidates')
            ->onDelete('cascade')
            ->onUpdate('cascade');

            $table->unsignedBigInteger('headhunter_id');
            $table->foreign('headhunter_id')
            ->references('id')
            ->on('headhunters')
            ->onDelete('cascade')
            ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('messages');
    }
};
