<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('tahfizhs', function (Blueprint $table) {
            // Check if the foreign key exists before attempting to drop it
            $foreignKeys = DB::select("SELECT CONSTRAINT_NAME FROM INFORMATION_SCHEMA.KEY_COLUMN_USAGE WHERE TABLE_NAME = 'tahfizhs' AND COLUMN_NAME = 'student_id' AND CONSTRAINT_NAME != 'PRIMARY'");
            if (!empty($foreignKeys)) {
                $table->dropForeign(['student_id']);
            }

            // Check if the column exists before attempting to drop it
            if (Schema::hasColumn('tahfizhs', 'student_id')) {
                $table->dropColumn('student_id');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tahfizhs', function (Blueprint $table) {
            if (!Schema::hasColumn('tahfizhs', 'student_id')) {
                $table->foreignId('student_id')->constrained()->onDelete('cascade');
            }
        });
    }
};
