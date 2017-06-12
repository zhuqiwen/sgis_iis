<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class InternStudentEvaluation
 */
class InternStudentEvaluation extends Model
{
    protected $table = 'intern_student_evaluations';

    public $timestamps = true;

    protected $fillable = [
        'application_id',
        'performance_comment',
        'has_noteworthy',
        'noteworthy_aspects',
        'need_improve',
        'student_weakness',
        'weakness_remedy',
        'suitability',
        'job_advice',
        'performance_rating',
        'development_rating',
        'is_midterm',
        'is_submitted'
    ];

    protected $guarded = [];

        
}