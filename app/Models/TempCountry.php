<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class TempCountry
 */
class TempCountry extends Model
{
    protected $table = 'temp_countries';

    public $timestamps = false;

    protected $fillable = [
        'sortname',
        'name',
        'phonecode'
    ];

    protected $guarded = [];

        
}