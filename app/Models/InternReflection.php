<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class InternReflection
 */
class InternReflection extends Model
{
    protected $table = 'intern_reflections';

    public $timestamps = true;

    protected $fillable = [
        'application_id',
        'reflection'
    ];

    protected $guarded = [];

        
}