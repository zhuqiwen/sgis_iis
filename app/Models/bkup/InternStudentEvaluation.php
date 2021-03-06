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
        'internship_id',
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
        'due_date',
        'submitted_at',
        'sent_at',
        'midterm_due_date',
        'midterm_sent_at',
        'midterm_submitted_at'
    ];

    protected $guarded = [];

        
}