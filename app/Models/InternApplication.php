<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class InternApplication
 */
class InternApplication extends Model
{
    protected $table = 'intern_applications';

    public $timestamps = true;

    protected $fillable = [
        'year',
        'term',
        'country',
        'state',
        'city',
        'street',
        'credit_hours',
        'budget_airfare',
        'budget_housing',
        'budget_meals',
        'budget_transportation',
        'budget_others',
        'depart_date',
        'return_date',
        'start_date',
        'end_date',
        'work_hours_per_week',
        'work_schedule',
        'description',
        'reasons',
        'cultural_interaction',
        'challenges',
        'user_id',
        'organization_id',
        'supervisor_id',
        'paid_internship',
        'liability_release_form_signed',
        'liability_release_signed_date',
        'is_approved',
        'approved_date',
        'approved_by',
        'is_submitted',
        'submitted_date',
        'submitted_by',
        'country_warning'
    ];

    protected $guarded = [];

        
}