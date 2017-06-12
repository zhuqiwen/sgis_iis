<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class InternSiteEvaluation
 */
class InternSiteEvaluation extends Model
{
    protected $table = 'intern_site_evaluations';

    public $timestamps = true;

    protected $fillable = [
        'application_id',
        'how_did_locate',
        'site_description',
        'task_description',
        'fit_into_study',
        'site_strength',
        'site_weakness',
        'gained_skills',
        'willing_to_recommend',
        'is_submitted'
    ];

    protected $guarded = [];

        
}