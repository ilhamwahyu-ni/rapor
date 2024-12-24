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
        Schema::table('tahfizhs', function (Blueprint $table) {
            if (Schema::hasColumn('tahfizhs', 'ayat')) {
                $table->dropColumn('ayat');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tahfizhs', function (Blueprint $table) {
            $table->integer('ayat');
        });
    }
};
