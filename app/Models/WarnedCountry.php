<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class WarnedCountry
 */
class WarnedCountry extends Model
{
    protected $table = 'warned_countries';

    public $timestamps = true;

    protected $fillable = [
        'type',
        'date',
        'country'
    ];

    protected $guarded = [];

        
}