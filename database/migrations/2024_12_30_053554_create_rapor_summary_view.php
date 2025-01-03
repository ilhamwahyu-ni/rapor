<?php

use Illuminate\Support\Facades\DB;
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
        DB::statement("
           CREATE OR REPLACE VIEW rapor_summary AS
           SELECT
           students.id AS student_id,
           students.name AS student_name,
           students.gender,
           students.school_id,
           ROUND(AVG(tahsins.fluency), 2) AS avg_fluency,
           ROUND(AVG(tahsins.izhar_harqi), 2) AS avg_izhar_harqi,
           ROUND(AVG(tahsins.qalqalah), 2) AS avg_qalqalah,
           ROUND(AVG(tahsins.lafaz_jalalah), 2) AS avg_lafaz_jalalah,
           ROUND(AVG(tahsins.score), 2) AS avg_tahsin_score,
           COUNT(tahfizhs.id) AS total_surah_memorized,
           SUM(tahfizhs.ayat) AS total_ayat_memorized,
           ROUND(AVG(tahfizhs.score), 2) AS avg_tahfizh_score
           FROM students
           LEFT JOIN tahsins ON students.id = tahsins.student_id
           LEFT JOIN tahfizhs ON students.id = tahfizhs.student_id
           GROUP BY
           students.id, students.name, students.gender, students.school_id;
        ");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rapor_summary_view');
    }
};
