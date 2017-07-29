<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class InternInternship
 */
class InternInternship extends Model
{
    protected $table = 'intern_internships';

    public $timestamps = true;

    protected $fillable = [
        'application_id',
        'application_notes',
        'final_notes',
        'x373_hours',
        'x373_grade',
        'case_closed',
        'closed_by'
    ];

    protected $guarded = [];


    /**
     * @param $internship_id
     * 4 docs:
     *  journal
     *  reflection
     *  site_evaluation
     *  student_evaluation
     */
    public function getAvailableDocs($internship_id)
    {
    }

        
}