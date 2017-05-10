<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class AcademicInfo
 */
class AcademicInfo extends Model
{
    protected $table = 'academic_info';

    public $timestamps = false;

    protected $fillable = [
        'contact_id',
        'field_id',
        'class_year',
        'degree',
        'created',
        'modified',
        'deleted'
    ];

    protected $guarded = [];

        
}