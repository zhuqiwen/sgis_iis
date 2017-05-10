<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class StudyField
 */
class StudyField extends Model
{
    protected $table = 'study_field';

    public $timestamps = false;

    protected $fillable = [
        'field',
        'created',
        'modified',
        'deleted'
    ];

    protected $guarded = [];

        
}