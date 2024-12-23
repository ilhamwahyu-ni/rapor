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
        Schema::create('tahfizhs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id');
            $table->string('surah_name');
            $table->integer('ayat');
            $table->integer('score');
            $table->date('evaluation_date');
            $table->text('note');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tahfizhs');
    }
};
