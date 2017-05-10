<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Event
 */
class Event extends Model
{
    protected $table = 'event';

    public $timestamps = false;

    protected $fillable = [
        'name',
        'date',
        'country',
        'state',
        'city',
        'created',
        'modified',
        'deleted'
    ];

    protected $guarded = [];

        
}