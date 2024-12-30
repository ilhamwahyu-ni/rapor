<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RaporSummary extends Model
{
    protected $table = 'rapor_summary';
    public $timestamps = false;
    protected $primaryKey = 'student_id';
    protected $fillable = [
        'student_id',
        'student_name',
        'gender',
        'school_id',
        'avg_fluency',
        'avg_izhar_harqi',
        'avg_qalqalah',
        'avg_lafaz_jalalah',
        'avg_tahsin_score',
        'total_surah_memorized',
        'total_ayat_memorized',
        'avg_tahfizh_score',
    ];
}
