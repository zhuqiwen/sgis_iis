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
        'case_closed'
    ];

    protected $guarded = [];

        
}