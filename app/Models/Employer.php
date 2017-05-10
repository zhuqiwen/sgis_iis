<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Employer
 */
class Employer extends Model
{
    protected $table = 'employer';

    public $timestamps = false;

    protected $fillable = [
        'name',
        'web_address',
        'type_id',
        'created',
        'modified',
        'deleted'
    ];

    protected $guarded = [];

        
}