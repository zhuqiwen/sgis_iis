<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class EmployerType
 */
class EmployerType extends Model
{
    protected $table = 'employer_type';

    public $timestamps = false;

    protected $fillable = [
        'type',
        'created',
        'modified',
        'deleted'
    ];

    protected $guarded = [];

        
}