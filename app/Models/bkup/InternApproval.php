<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class InternApproval
 */
class InternApproval extends Model
{
    protected $table = 'intern_approvals';

    public $timestamps = true;

    protected $fillable = [
        'application_id',
        'application_notes',
        'final_notes',
        'x373_hours',
        'journal_submitted',
        'reflection_submitted',
        'site_eval_submitted',
        'midterm_eval_sent_date',
        'midterm_eval_received',
        'final_eval_sent_date',
        'final_eval_received',
        'x373_grade',
        'case_closed'
    ];

    protected $guarded = [];

        
}