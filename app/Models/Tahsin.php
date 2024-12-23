<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Tahsin extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'fluency',
        'izhar_harqi',
        'qalqalah',
        'lafaz_jalalah',
        'evaluation_date',
        'note',
        'score',
        'student_id',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'fluency' => 'integer',
        'izhar_harqi' => 'integer',
        'qalqalah' => 'integer',
        'lafaz_jalalah' => 'integer',
        'evaluation_date' => 'date',
        'score' => 'integer',
        'student_id' => 'integer',
    ];

    protected static function boot()
    {
        parent::boot();

        static::saving(function ($tahsin) {
            $tahsin->score = ($tahsin->fluency + $tahsin->izhar_harqi + $tahsin->qalqalah + $tahsin->lafaz_jalalah) / 4;
        });
    }

    public function student(): BelongsTo
    {
        return $this->belongsTo(Student::class);
    }
}
