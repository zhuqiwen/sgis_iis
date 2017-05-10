<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Employment
 */
class Employment extends Model
{
    protected $table = 'employment';

    public $timestamps = false;

    protected $fillable = [
        'contact_id',
        'employer_id',
        'job_title',
        'country',
        'state',
        'city',
        'created',
        'modified',
        'deleted'
    ];

    protected $guarded = [];

        
}